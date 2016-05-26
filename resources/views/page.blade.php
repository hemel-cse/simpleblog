@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
                 <div class="panel-heading"><h3> {{$page->title}} </h3></div>
                 <div class="panel-body">
                   <div class="container">
                     <p> {{$page->body}} </p>
                   </div>
                     @if(Auth::check())
                     <div class="container">
                     </br>
                     <p>    <a href="{{ action('pageController@edit', [$page->slug]) }}"> Edit</a></p>
                     </div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
