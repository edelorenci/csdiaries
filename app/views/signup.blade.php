@extends('_master')





@section('content')

<a class='link' href='/'>Back</a><br><br>

	<h1>Children's Science Diaries</h1>
	<hr>
	<h2>Become a member!</h2>


	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach

	<blockquote>

		{{ Form::open(array('url' => '/signup')) }}

			FIRST NAME<br>
			{{ Form::text('firstname') }}<br><br>
		
			LAST NAME<br>
			{{ Form::text('lastname') }}<br><br>

			LOGIN NAME<br>
			{{ Form::text('login') }}<br><br>

			PASSWORD<br>
			{{ Form::password('password') }}
			<small>Min: 6</small>
			<br>
			{{ Form::submit('Submit') }}

		{{ Form::close() }}

	</blockquote>

@stop