<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $fillable = [
      'title',
      'image_url',
      'description',
      'timestamp'
   ];
}
