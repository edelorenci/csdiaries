@extends('_master')



@section('content')

	<a class='link' href='/diary'>Back</a><br><br>
	
	<h1> {{ ucfirst(Auth::user()->firstname); }}'s Science Diaries</h1>
	<hr>
	<br>
	<h2>You have no diaries!</h2>

	
@stop