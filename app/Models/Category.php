<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
  public function project(){
    return $this->hasMany('App\Models\Project');
  }

  public function delete(){
    // delete all related photos
    $this->project()->delete();
    // as suggested by Dirk in comment,
    // it's an uglier alternative, but faster
    // Photo::where("user_id", $this->id)->delete()

    // delete the user
    return parent::delete();
  }
}
