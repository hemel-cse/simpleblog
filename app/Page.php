<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $fillable = [
      'title',
      'slug',
      'body',
      'published_at'
   ];

   public function user()
     {
         return $this->belongsTo('App\User');
     }

}
