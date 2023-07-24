<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\ProjectImage;
use Image;

class ProjectController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Project
  public function projectLists(){
    $getProject = Project::get();
    return view('admin.project.projectLists')->with('allproject', $getProject);
  }


  // Viewing Project Form to Add Project
  public function addProject(){
    return view('admin.project.addProject');
  }


  // Storing the Project in the Database
  public function storeProject(Request $request){
    //Validation Part
    $request->validate([
      'title' => 'required|max:100',
      'description' => 'required',
      'category' => 'not_in:0',
      'service' => 'not_in:0',
      'client' => 'not_in:0',
      'team' => 'not_in:0',
      'images' => 'required',
    ]);

    $storeProject = new Project;

    $storeProject->title = $request->title;
    $storeProject->slug = Str::slug($request->title);
    $storeProject->description = $request->description;
    $storeProject->category_id = $request->category;
    $storeProject->service_id = $request->service;
    $storeProject->client_id = $request->client;
    $storeProject->team_id = $request->team;

    $storeProject->save();

    if(count($request->images) > 0){
      foreach($request->images as $index => $image){
        $imageName = Str::slug($request->title) . '-' . $index . '.' . $image->getClientOriginalExtension();
        $setLocation = public_path('images/project/' . $imageName);
        Image::make($image)->save($setLocation);

        $projectImage = new ProjectImage;

        $projectImage->project_id = $storeProject->id;
        $projectImage->image = $imageName;

        $projectImage->save();
      }
    }

    // Success message
    session()->flash('success', 'Project Added Successfully.');

    return redirect()->route('projectLists');
  }

  // Project Editing form
  public function editProject($requestId){
    $editedProject = Project::where('id', $requestId)->first();
    return view('admin.project.editProject')->with('project', $editedProject);
  }

  // Storing the Project in the Database
  public function updatedProject(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'title' => 'required|max:100',
      'description' => 'required',
      'category' => 'not_in:0',
      'service' => 'not_in:0',
      'client' => 'not_in:0',
      'team' => 'not_in:0',
      'images' => 'sometimes',
    ]);

    $updateProject = Project::where('id', $requestId)->first();

    $updateProject->title = $request->title;
    $updateProject->slug = Str::slug($request->title);
    $updateProject->description = $request->description;
    $updateProject->category_id = $request->category;
    $updateProject->service_id = $request->service;
    $updateProject->client_id = $request->client;
    $updateProject->team_id = $request->team;

    $updateProject->save();

    if($request->file('images')){
      if(count($request->images) > 0){
        foreach($request->images as $image){
          $imageName = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
          $setLocation = public_path('images/project/' . $imageName);
          Image::make($image)->save($setLocation);

          $projectImage = new ProjectImage;
          // dd($projectImage);

          $projectImage->project_id = $updateProject->id;
          $projectImage->image = $imageName;

          $projectImage->save();
        }
      }
    }

    // Success message
    session()->flash('success', 'Project Updated Successfully.');

    return redirect()->route('projectLists');
  }

  // Delete the Project
  public function deleteProject($requestId){
    $deleteProject = Project::where('id', $requestId)->first();
    // dd($deleteProject);

    if(!empty($deleteProject)){
      $deleteProject->delete();
    }

    return redirect()->route('projectLists');
  }

  // Status
  public function projectStatus($id, $status){
    $projectStatus = Project::find($id);
    $projectStatus->status = $status;
    $projectStatus->save();
  }
}
