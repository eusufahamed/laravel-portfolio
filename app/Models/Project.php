<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
  public function images(){
    return $this->hasMany('App\Models\ProjectImage');
  }

  public function delete(){
    $this->images()->delete();
    return parent::delete();
  }

  public function category(){
    return $this->belongsTo('App\Models\Category');
  }

  public function service(){
    return $this->belongsTo('App\Models\Service');
  }

  public function client(){
    return $this->belongsTo('App\Models\ClientInfo');
  }

  public function team(){
    return $this->belongsTo('App\Models\Team');
  }
}
