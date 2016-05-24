@extends('layouts.adminhome')

@section('content')
<div class="container">
<h1> Add a new page</h1>
</div>
<hr/>
<br/>
<div class="container">
  {!! Form::model($page = new \App\Page, ['url' => '/admin/page']) !!}

   @include ('admin.pages.form', ['submitButtonText' => 'Add Page'])

  {!! Form::close() !!}
  <br/>
  @include ('errors.list')
  </div>
@endsection
