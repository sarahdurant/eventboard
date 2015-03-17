<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Noticeboard</title>

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        Banner
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="title">
                @if (Auth::guest())
                    <li><a href="/auth/register">Register</a></li>
                    {!! Form::open(array('action' => array('userController@registerUser', $user->id))) !!}
                    {!! Form::label('email', 'E-Mail Address')!!} {!! Form::text('email')!!}<br>
                    {!! Form::label('password', 'Password')!!} {!! Form::password('password') !!}
                    {!! Form::submit('Log in') !!}
                    {!! Form::close() !!}
                @else
                    <!-- display calendar -->
                    <b>Calendar</b>
                @endif
            </div>
        </div>
        <div class="col-xs-6">
            @if (Auth::guest())
                {!! Form::open(array('url' => 'foo/bar', 'method' => 'put')) !!}
                {!! Form::label('email', 'E-Mail Address')!!} {!! Form::text('email')!!}<br>
                {!! Form::label('password', 'Password')!!} {!! Form::password('password') !!}
                {!! Form::submit('Log in') !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>


