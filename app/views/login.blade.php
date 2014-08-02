@extends('_master')




@section('content')

	<a class='link' href='/'>Back</a><br><br>

	
	<h1>Children's Science Diaries</h1>
	<hr>
	<br>
	<h2>Work on your diaries!</h2>
	<br>
	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach

   <blockquote>

	{{ Form::open(array('url' => '/login')) }}

		LOGIN NAME<br>
		{{ Form::text('login') }}<br><br>

		PASSWORD<br>
		{{ Form::password('password') }}<br>
		<br><br>

		{{ Form::submit('Log in') }}

	{{ Form::close() }}

   </blockquote>

@stop


