<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientInfo;
use Image;

class ClientController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get and View Client
  public function clientLists(){
    $getclientInfo = ClientInfo::get();
    return view('admin.client.clientLists')->with('clientInfo', $getclientInfo);
  }


  // Viewing Client Form to Add Client
  public function addClient(){
    return view('admin.client.addClient');
  }


  // Storing the Client in the Database
  public function storeClient(Request $request){
    //Validation Part
    $request->validate([
      'clientName' => 'required',
      'webUrl' => 'sometimes|nullable|url',
      'clientLogo' => 'required|image|mimes:png',
    ]);

    // Image file processing
    $getLogo = $request->file('clientLogo');
    $logoName = time() . '.' . $getLogo->getClientOriginalExtension();
    $setLocation = public_path('images/clientLogo/' . $logoName);

    Image::make($getLogo)->resize(120, 120)->save($setLocation);

    // Client created Object
    $storeClient = new ClientInfo;

    $storeClient->name = $request->clientName;
    $storeClient->logo = $logoName;
    $storeClient->link = $request->webUrl;

    $storeClient->save();

    // Success message
    session()->flash('success', 'Client Added Successfully.');

    return redirect()->route('clientLists');
  }

  // Client Editing form
  public function editClient($requestId){
    $editClient = ClientInfo::where('id', $requestId)->first();
    return view('admin.client.editClient')->with('client', $editClient);
  }


  // Updating the Client in the Database
  public function updatedClient(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'clientName' => 'required',
      'webUrl' => 'sometimes|nullable|url',
      'clientLogo' => 'sometimes|image|mimes:png',
    ]);

    $updatedClient = ClientInfo::where('id', $requestId)->first();

    $updatedClient->name = $request->clientName;
    $updatedClient->link = $request->webUrl;

    // Add the updated photo
    if($request->file('clientLogo')){
      // Delete the old photo
      if(file_exists('images/clientLogo/' . $updatedClient->logo) AND !empty($updatedClient->logo)){
        unlink(public_path('images/clientLogo/' . $updatedClient->logo));
      }

      // processing new photo
      $getLogo = $request->file('clientLogo');
      $logoName = time() . '.' . $getLogo->getClientOriginalExtension();
      $setLocation = public_path('images/clientLogo/' . $logoName);

      Image::make($getLogo)->resize(400, 400)->save($setLocation);

      // Updated the new photo
      $updatedClient->logo = $logoName;
    }

    $updatedClient->save();

    // Success message
    session()->flash('success', 'Client Updated Successfully.');

    return redirect()->route('clientLists');
  }


  // Delete the Client
  public function deleteClient($requestId){
    $deleteClient = ClientInfo::where('id', $requestId)->first();

    if(!is_null($deleteClient)){
      if(file_exists('images/clientLogo/' . $deleteClient->logo) AND !empty($deleteClient->logo)){
        unlink(public_path('images/clientLogo/' . $deleteClient->logo));
      }

      $deleteClient->delete();
    }

    return redirect()->route('clientLists');
  }
}
