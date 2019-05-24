<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = ['name', 'description'];
}
