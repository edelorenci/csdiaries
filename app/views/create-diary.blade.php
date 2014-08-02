@extends('_master')



@section('content')

<a class='link' href='/diary'>Back</a><br><br>
	
	<h1> {{ ucfirst(Auth::user()->firstname); }}'s Science Diaries </h1>
	<hr>
	<br>
	<h2> Diary information </h2>
	<br><br>
	<blockquote>

		{{ Form::open(array('url' => '/diary/create', 'method' => 'POST')) }}

		
			TITLE <br> 
			{{ Form::text('title') }}		
		
			<br><br>
				
			KEYWORDS <br> 
			{{ Form::text('keywords') }}
						
			<small> Examples: <br>

			Title: The butterfly life cycle      - Keywords: insect,butterfly,life cycle <br>
			Title: Growing beans on cotton balls - Keywords: vegetable,beans,grow <br>
			Title: Colony of ants in my backyard - Keyword: insect,ants<br>
			</small>
			<br><br>

			{{ Form::submit('Create diary!') }}

		{{ Form::close() }}
	</blockquote>
	
@stop