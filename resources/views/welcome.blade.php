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
    <style>
        #registerForm {
            display: none;
        }
        .banner{
            height: 100px;
            background-color: #0088CC;
            color: #222222;
        }
        .top5per { margin-top:5%; }
        .top7per { margin-top:7%; }
        .top10per { margin-top:10%; }
        .top15per { margin-top:15%; }
        .top17per { margin-top:17%; }
        .top30per { margin-top:30%; }
    </style>

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
        <div class="col-xs-12">
            <div class="banner text-center">Banner</div>
        </div>
    </div>
    <div class="row top5per">
        <div class="col-xs-6">
            <div class="title">
                @if (Auth::guest())
                    <button id='registerDisplayBtn'>Sign up!</button>
                    <div id="registerForm">
                    {!! Form::open(array('url' => '/eventboard/public/auth/register', 'method' => 'post')) !!}
                    {!! Form::label('email', 'E-Mail Address')!!} {!! Form::text('email')!!}<br>
                    {!! Form::label('password', 'Password')!!} {!! Form::password('password') !!}<br>
                    {!! Form::label('confirmPassword', 'Confirm Password')!!} {!! Form::password('confirmPassword') !!}<br>
                    {!! Form::select('isOrganizer', array('P' => 'Participant', 'O' => 'Organizer'), 'P') !!}<br>
                    {!! Form::submit('Register') !!}
                    {!! Form::close() !!}
                    </div>
                @else
                    <!-- display calendar -->
                    <b>Calendar</b>
                @endif
            </div>
        </div>
        <div class="col-xs-6">
            @if (Auth::guest())
                {!! Form::open(array('url' => '/eventboard/public/auth/login', 'method' => 'post')) !!}
                {!! Form::label('email', 'E-Mail Address')!!} {!! Form::text('email')!!}<br>
                {!! Form::label('password', 'Password')!!} {!! Form::password('password') !!}<br>
                {!! Form::submit('Log in') !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script>
        $("#registerDisplayBtn").click(function() {
            $( "#registerForm" ).toggle(100);
        });
</script>

</body>
</html>


