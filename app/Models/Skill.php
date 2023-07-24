<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model{
  public function team(){
    return $this->belongsTo('App\Models\Team');
  }
}
