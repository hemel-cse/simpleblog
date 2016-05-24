@extends('layouts.app')

@section('content')
<div class="container"> <h1> {{$pages->title}} </h1> </div>
<hr/>
<br/>
<div class="container">
<p>    {{$pages->body}}  </p>
</div>
 @if(Auth::check())
 <div class="container">
 <p>    <a href="{{ action('pageController@edit', [$pages->id]) }}"> Edit</a></p>
 </div>
 @endif
@endsection
