<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Team;
use Image;

class TeamController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Team
  public function teamLists(){
    $getTeam = Team::get();
    return view('admin.team.teamLists')->with('allTeamMember', $getTeam);
  }


  // Viewing Form to Add Team Members
  public function addTeam(){
    return view('admin.team.addTeam');
  }


  // Storing the Team in the Database
  public function storeTeam(Request $request){
    //Validation Part
    $request->validate([
      'memberName' => 'required',
      'memberTitle' => 'required|max:70',
      'memberdesignation' => 'required|max:30',
      'memberAddress' => 'required',
      'memberPhone' => 'required|numeric|digits:11',
      'memberEmail' => 'required|email',
      'memberResume' => 'sometimes|file|mimes:pdf',
      'memberImage' => 'required|image|mimes:jpeg,png',
      'memberDescription' => 'required',
    ]);

    // File processing
    $fileName = "";
    if($request->file('memberResume')){
      $getFile = $request->file('memberResume');
      $fileName = Str::slug($request->memberName) . '.' . $getFile->getClientOriginalExtension();
      $setLocation = public_path('file/');

      $getFile->move($setLocation, $fileName);
    }

    // Image file processing
    $getImage = $request->file('memberImage');
    $imageName = Str::slug($request->memberName) . '.' . $getImage->getClientOriginalExtension();
    $setLocation = public_path('images/team/' . $imageName);

    Image::make($getImage)->resize(400, 440)->save($setLocation);

    // Created Team Object
    $storeTeam = new Team;

    $storeTeam->name = $request->memberName;
    $storeTeam->slug = Str::slug($request->memberName);
    $storeTeam->title = $request->memberTitle;
    $storeTeam->designation = $request->memberdesignation;
    $storeTeam->address = $request->memberAddress;
    $storeTeam->phone = $request->memberPhone;
    $storeTeam->email = $request->memberEmail;
    $storeTeam->resume = $fileName;
    $storeTeam->image = $imageName;
    $storeTeam->description = $request->memberDescription;

    $storeTeam->save();

    // Success message
    session()->flash('success', 'Team Added Successfully.');

    return redirect()->route('teamLists');
  }


  // Team Editing form
  public function editTeam($requestId){
    $editedTeam = Team::where('id', $requestId)->first();
    return view('admin.team.editTeam')->with('team', $editedTeam);
  }


  // Updating the Team in the Database
  public function updatedTeam(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'memberName' => 'required',
      'memberTitle' => 'required|max:70',
      'memberdesignation' => 'required|max:30',
      'memberAddress' => 'required',
      'memberPhone' => 'required|numeric|digits_between:10,11',
      'memberEmail' => 'required|email',
      'memberResume' => 'sometimes|file|mimes:pdf',
      'memberImage' => 'sometimes|image|mimes:jpeg,png',
      'memberDescription' => 'required',
    ]);

    $updatedTeam = Team::where('id', $requestId)->first();

    $updatedTeam->name = $request->memberName;
    $updatedTeam->slug = Str::slug($request->memberName);
    $updatedTeam->title = $request->memberTitle;
    $updatedTeam->designation = $request->memberdesignation;
    $updatedTeam->address = $request->memberAddress;
    $updatedTeam->phone = $request->memberPhone;
    $updatedTeam->email = $request->memberEmail;
    $updatedTeam->description = $request->memberDescription;

    // File processing
    if($request->file('memberResume')){
      // Delete the old file
      if(file_exists('file/' . $updatedTeam->resume) AND !empty($updatedTeam->resume)){
        unlink(public_path('file/' . $updatedTeam->resume));
      }

      // processing new file
      $getFile = $request->file('memberResume');
      $fileName = Str::slug($request->memberName) . '.' . $getFile->getClientOriginalExtension();
      $setLocation = public_path('file/');

      $getFile->move($setLocation, $fileName);

      // Updated the new file
      $updatedTeam->resume = $fileName;
    }

    // Image file processing
    if($request->file('memberImage')){
      // Delete the old image
      if(file_exists('images/team/' . $updatedTeam->image) AND !empty($updatedTeam->image)){
        unlink(public_path('images/team/' . $updatedTeam->image));
      }

      $getImage = $request->file('memberImage');
      $imageName = Str::slug($request->memberName) . '.' . $getImage->getClientOriginalExtension();
      $setLocation = public_path('images/team/' . $imageName);

      Image::make($getImage)->resize(400, 440)->save($setLocation);

      // Updated the new file
      $updatedTeam->image = $imageName;
    }

    $updatedTeam->save();

    // Success message
    session()->flash('success', 'Team Updated Successfully.');

    return redirect()->route('teamLists');
  }


  // Delete the Client
  public function deleteTeam($requestId){
    $deleteTeam = Team::where('id', $requestId)->first();

    if(!is_null($deleteTeam)){
      if(file_exists('file/' . $deleteTeam->resume) AND !empty($deleteTeam->resume)){
        unlink(public_path('file/' . $deleteTeam->resume));
      }

      if(file_exists('images/team/' . $deleteTeam->image) AND !empty($deleteTeam->image)){
        unlink(public_path('images/team/' . $deleteTeam->image));
      }

      $deleteTeam->delete();
    }

    // Success message
    session()->flash('success', 'Team Deleted Successfully.');

    return redirect()->route('teamLists');
  }
}
