<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  use \Dimsav\Translatable\Translatable;

  public $translatedAttributes = ['name', 'description'];
  protected $fillable = ['image', 'order', 'level'];

  // Relationship to many Workshops
  public function workshops()
  {
    return $this->hasMany('App\Workshop');
  }
}
