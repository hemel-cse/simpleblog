@extends('layouts.adminhome')

@section('content')
<div class="container">
  <p><h1> Pages </h1> <span class="pull-right btn btn-default"> <a href="{{ action('pageController@create') }}">Add New Page</a> </span> </p>

  <hr/>
  <br/>
  @foreach ($pages as $page)
        <page>
        <ul class="list-group">
        <li class="list-group-item well">
          <a href="{{ action('pageController@show', [$page->slug]) }} "> {{$page->title}} </a>
          @if(Auth::check())
          <span class="pull-right">
          <span class="btn btn-default">
          <a href="{{ action('pageController@edit', [$page->slug]) }}"> Edit</a>
          </span>
          <span class="btn">
             {{ Form::open(['method' => 'DELETE', 'action' => ['pageController@destroy', $page->slug]]) }}
                 {{ Form::submit('Delete', ['class' => 'btn-danger']) }}
               {{ Form::close() }}
          </span>
        </span>
          @endif
         </li>
        </ul>
        </page>


  @endforeach

</div>

@endsection
