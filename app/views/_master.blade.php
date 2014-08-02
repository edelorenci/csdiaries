<!doctype html>
<html>
<head>
	<meta charset='utf-8'>

	<title>@yield('title',"CHILDREN'S SCIENCE DIARIES")</title>

	{{ HTML::style( 'styles/bootstrap.min.css' ); }}
	{{ HTML::style( 'styles/csdiaries.css' ); }}

	@yield('head')

</head>

<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif


	@if(Auth::check())
		<a class= "link" href='/logout'>Log out {{ Auth::user()->login; }}</a><br><br>
		
	@endif

	@yield('content')

	@yield('body')

</body>

</html>