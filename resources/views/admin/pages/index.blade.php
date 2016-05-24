@extends('layouts.adminhome')

@section('content')
<div class="container">
  <p><h1> Pages </h1> <span class="pull-right btn btn-default"> <a href="{{ action('pageController@create') }}">Add New Page</a> </span> </p>

  <hr/>
  <br/>
  @foreach ($pages as $page)
        <page>
        <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ action('pageController@show', [$page->id]) }} "> {{$page->title}} </a>
          @if(Auth::check())
          <span class="pull-right">
          <span class="btn">
          <a href="{{ action('pageController@edit', [$page->id]) }}"> Edit</a>
          </span>
            <span class="btn">
             <a href="{{ action('pageController@destroy', [$page->id]) }}"> Delete</a>
          </span>
        </span>
          @endif
         </li>
        </ul>
        </page>


  @endforeach

</div>

@endsection
