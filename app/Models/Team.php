<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model{
  public function skills(){
    return $this->hasMany('App\Models\Skill');
  }

  public function delete(){
    $this->skills()->delete();
    return parent::delete();
  }
}
