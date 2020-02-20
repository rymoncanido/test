<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
       
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="{{asset('js/app.js')}}"></script>
	</head>
	<style>

	</style>
    <body>
        <div class="wrapper">
			<header>
				Juan's Auto Paint
			</header>
			<nav>
				<a href="{{route('new')}}" {{ (request()->is('new')) ? 'class=active' : '' }}> NEW PAINT JOB</a>
				<a href="{{route('paintjobs')}}" {{ (request()->is('paintjobs')) ? 'class=active' : '' }}>PAINT JOBS</a>
			</nav>
            <div class="content">
				@yield('content')
			</div>
		</div>
	</body>
</html>