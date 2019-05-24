<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceTranslation extends Model
{
  public $timestamps = false;
  protected $fillable = ['name'];
}
