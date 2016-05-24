@extends('layouts.app')

@section('content')
<div class="container"> <h1> {{$page->title}} </h1> </div>
<hr/>
<br/>
<div class="container">
<p>    {{$page->body}}  </p>
</div>
 @if(Auth::check())
 <div class="container">
 <p>    <a href="{{ action('pageController@edit', [$page->id]) }}"> Edit</a></p>
 </div>
 @endif
@endsection
