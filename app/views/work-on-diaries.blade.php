@extends('_master')



@section('content')
	
	
	<h1> {{ ucfirst(Auth::user()->firstname); }}'s Science Diaries</h1>
	<hr>
	<br>
	<h2>Work on your diaries!</h2>
	<br>
	<blockquote>

	
	
		<dl>
			<dt><a class = "lead" href='/diary/list/'>Select Diary</a></dt>
			
			<br>			

  			<dt><a class = "lead" href='/diary/create'>Create new diary</a></dt>

		</dl>
		  		 
	</blockquote>


	
@stop