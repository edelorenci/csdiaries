@extends('_master')



@section('content')

{{ HTML::linkAction('DiaryController@getList', 'Back') }}

<h1> {{ ucfirst($diary[0]['title']); }}</h1>

	<hr>
	
	<blockquote>

		
		{{ Form::open(array('url' => '/page/add-data/'.$diary[0]['id'])) }}

			New information <br>

			{{ Form::textarea('info') }}
	
			<br><br>

			Picture URL<br>

			{{ Form::text('picture') }}
			
			<br><br>			

			{{ Form::submit('Save!') }}

		{{ Form::close() }}

	</blockquote>

@stop

