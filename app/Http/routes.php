<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/sendmail', function()
{
  $data = array(
       'name' => "Hemel",
   );

  Mail::send('layouts.mails.welcome', $data, function($message)
  {
     $message->from('hemel.bubt@gmail.com', 'Hemel');
     $message->to('Wrign1989@einrot.com')->subject('welcome to demo project!');
  });

});

Route::group(['middleware' => ['auth']], function () {

        Route::get('admin', 'adminController@index');


});


Route::resource('admin/page', 'pageController',['except' => ['show']]);

Route::auth();

Route::get('/{slug}', 'pageController@show');
