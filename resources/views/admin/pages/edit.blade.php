@extends('layouts.adminhome')

@section('content')
<div class="container">
<h1> Editing : {!! $page->title !!}</h1>
</div>
<hr/>
<br/>

<div class="container">

  {!! Form::model($page, ['method' => 'PATCH', 'action' => ['pageController@update', $page->id]]) !!}

      @include ('admin.pages.form', ['submitButtonText' => 'Update Page'])

  {!! Form::close() !!}
  <br/>
  @include ('errors.list')

</div>

@endsection
