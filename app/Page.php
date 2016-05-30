<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Page extends Model
{
   protected $fillable = [
      'title',
      'slug',
      'body',
      'published_at'
   ];

   protected $dates = ['published_at'];


       public function scopePublished($query)
       {
         $query->where('published_at', '<=', carbon::now());
       }


       public function scopeUnpublished($query)
       {
         $query->where('published_at', '>', carbon::now());
       }


       public function setPublishedAtAttribute($date)
       {
         $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
       }

       public function getPublishedAtAttribute($date)
       {
           return Carbon::parse($date)->format('Y-m-d');
       }


   public function user()
     {
         return $this->belongsTo('App\User');
     }

}
