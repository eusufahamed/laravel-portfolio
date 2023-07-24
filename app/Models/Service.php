<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model{
  public function project(){
    return $this->hasMany('App\Models\Project');
  }

  public function delete(){
    $this->project()->delete();
    return parent::delete();
  }
}
