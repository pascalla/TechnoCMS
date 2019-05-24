<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
  use \Dimsav\Translatable\Translatable;

  public $translatedAttributes = ['name', 'description'];
  protected $fillable = ['subject_id', 'image', 'order'];

  // Relationship to resources
  public function resources()
  {
    return $this->hasMany('App\Resource');
  }

  public function subject(){
     return $this->belongsTo('App\Subject')->first();
  }
}
