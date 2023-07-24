<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Services
  public function serviceLists(){
    $getServices = Service::get();
    return view('admin.service.serviceLists')->with('service', $getServices);
  }


  // Viewing Service Form to Add Service
  public function addService(){
    return view('admin.service.addService');
  }


  // Storing the Service in the Database
  public function storeService(Request $request){
    $request->validate([
      'serviceName' => 'required|unique:services,name|max:26',
      'serviceDescription' => 'required|max:200',
    ]);

    $storeService = new Service;

    $storeService->name = $request->serviceName;
    $storeService->description = $request->serviceDescription;

    $storeService->save();

    session()->flash('success', 'Service Added Successfully.');

    return redirect()->route('serviceLists');
  }

  // Service Editing form
  public function editService($requestId){
    $editService = Service::where('id', $requestId)->first();
    return view('admin.service.editService')->with('findedService', $editService);
  }

  // Updating the Service in the Database
  public function updatedService(Request $request, $requestId){
    $request->validate([
      'serviceName' => 'required|max:26',
      'serviceDescription' => 'required|max:200',
    ]);

    $updatedService = Service::where('id', $requestId)->first();

    $updatedService->name = $request->serviceName;
    $updatedService->description = $request->serviceDescription;

    $updatedService->save();

    session()->flash('success', 'Service Updated Successfully.');

    return redirect()->route('serviceLists');
  }

  // Delete the Contact
  public function deleteService($requestId){
    $deleteService = Service::where('id', $requestId)->first();

    if(!is_null($deleteService)){
      $deleteService->delete();
    }

    return back();
  }
}
