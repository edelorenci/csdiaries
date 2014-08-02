@extends('_master')



@section('content')

<a class='link' href='/diary'>Back</a><br><br>

<h1> {{ ucfirst($diary[0]['title']); }}</h1>
	
	<hr>

	<br>
	
	<blockquote>

		{{ Form::open(array('url' => '/page/add-data/'.$diary[0]['id'], 'method' => 'GET')) }}

			{{ Form::submit('Add information') }}

		{{ Form::close() }}

	</blockquote>

	@foreach ($diary[0]['pages'] as $page) 
			
			<hr>
			
			<h5>{{ $page['created_at']; }}</h5>	

			<br>
			
			<div class="page">

				<p>{{ $page['info']; }}</p> 
			</div>

			<br><br>
			
			@if (!empty($page['picture']))

				<img  class="img-thumbnail" src='{{ $page['picture'] }}' height="120px" width="200px"> 
		
			@endif
			
	@endforeach 
	

@stop