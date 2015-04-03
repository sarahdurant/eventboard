<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EventBoard</title>
    <link rel="stylesheet" href="/eventboard/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/eventboard/vendor/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="/eventboard/css/app.css" >
		<link href="/eventboard/css/responsive-calendar.css" rel="stylesheet" media="screen">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


    <!-- Scripts -->
    <script type="text/javascript" src="/eventboard/vendor/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/eventboard/vendor/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/eventboard/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/eventboard/vendor/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="/eventboard/js/bootbox.min.js"></script>
		<script src="/eventboard/js/responsive-calendar.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">EventBoard</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/eventboard/">Calendar</a></li>
					<li><a href="/eventboard/events">Search for Events</a></li>
				</ul>


				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/eventboard/auth/login">Login</a></li>
						<li><a href="/eventboard/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/eventboard/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
	@yield('content')
	</div>


</body>
</html>
