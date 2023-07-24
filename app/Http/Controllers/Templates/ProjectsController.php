<?php
namespace App\Http\Controllers\Templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller{
  public function projectsView(){
    $data['page_title'] = 'projects';
    $data['project'] = Project::orderBy('id', 'desc')->get();
    return view('templates.pages.projects.allProjects')->with($data);
  }

  public function projectDetailView($s_Slug){
    $data['page_title'] = 'projects';
    $data['project'] = Project::where('slug', $s_Slug)->first();

    if(! is_null($data['project'])){
      return view('templates.pages.projects.detailProjects')->with($data);
    }
    else{
      return redirect()->route('projectsView');
    }
  }
}
