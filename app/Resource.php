<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
  use \Dimsav\Translatable\Translatable;
  
  public $translatedAttributes = ['name'];
  protected $fillable = ['file', 'workshop_id'];

  public function workshop(){
    return $this->belongsTo('App\Workshop');
  }

}
