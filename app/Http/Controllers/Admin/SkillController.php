<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Team;

class SkillController extends Controller{
  // Auth middleWare
  public function __construct(){
    $this->middleware('auth');
  }


  // Get Skill
  public function skillLists(){
    $getSkill = Skill::get();
    return view('admin.skill.skillLists')->with('allSkill', $getSkill);
  }


  // Viewing Form to Add Skill
  public function addSkill(){
    $getTeam = Team::get();
    return view('admin.skill.addSkill')->with('allTeam', $getTeam);
  }


  // Storing the Skill in the Database
  public function storeSkill(Request $request){
    //Validation Part
    $request->validate([
      'member' => 'not_in:0',
      'skillName' => 'required|max:30',
      'percentage' => 'required|numeric|digits_between:1,3',
    ]);

    $storeSkill = new Skill;

    $storeSkill->team_id = $request->member;
    $storeSkill->name = $request->skillName;
    $storeSkill->percent = $request->percentage;

    $storeSkill->save();

    // Success message
    session()->flash('success', 'Skill Added Successfully.');

    return redirect()->route('skillLists');
  }


  // Skill Editing form
  public function editSkill($requestId){
    $data['skill'] = Skill::where('id', $requestId)->first();
    $data['allTeam'] = Team::get();
    return view('admin.skill.editSkill')->with($data);
  }


  // Updating the skill in the Database
  public function updatedSkill(Request $request, $requestId){
    //Validation Part
    $request->validate([
      'member' => 'not_in:0',
      'skillName' => 'required|max:30',
      'percentage' => 'required|numeric|digits_between:1,3',
    ]);

    $updatedSkill = Skill::where('id', $requestId)->first();

    $updatedSkill->team_id = $request->member;
    $updatedSkill->name = $request->skillName;
    $updatedSkill->percent = $request->percentage;

    $updatedSkill->save();

    // Success message
    session()->flash('success', 'Skill Updated Successfully.');

    return redirect()->route('skillLists');
  }


  // Delete the Skill
  public function deleteSkill($requestId){
    $deleteSkill = Skill::where('id', $requestId)->first();

    if(!is_null($deleteSkill)){
      $deleteSkill->delete();
    }

    return back();
  }
}
