@extends('_master')



@section('content')

<a class='link' href='/diary'>Back</a><br><br>

<h1> {{ ucfirst(Auth::user()->firstname); }}'s Science Diaries</h1>
	<hr>
	<br>
	<h2>Select diary!</h2>
	<br>
	<blockquote>

		{{Form::open(array('url' => '/diary/list'))}}
	
			{{ Form::select('diary_id', $listdiaries)}}
			<br><br>
			{{ Form::submit('View diary') }}
 	
		{{Form::close()}}

	</blockqute>
 
@stop