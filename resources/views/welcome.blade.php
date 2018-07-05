<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('img/logo-3.png') }}" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pbook.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: rgba(0,0,0,0.025);
                font-family: 'Raleway', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <div class="clearfix">
                <img src="{{ asset('img/logo-2.png') }}" width="50" class="pull-left">
                <div class="pull-left"><p class="logo-text">PBOOK</p></div>
                <div class="pull-right" class="navbar-buttons">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-brand btn-sm" href="{{ route('login') }}" role="button">LOGIN</a>
                        <a class="login-button" href="{{ route('register') }}">Join</a>
                    @endauth
                </div>
            </div>
            <br><br>
            <h1 class="display-4">Hello, welcome!</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies molestie ex vitae lobortis. Suspendisse potenti. Proin at lectus pretium, semper metus nec, blandit dui. Nunc sodales pretium orci et cursus.</p>
            <p class="lead">
                
            </p>
        </div>
        <div class="container">
            <div class="panel panel-default deduct-top">
                <div class="panel-body">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-4">
                                <center>
                                    <br><img src="{{ asset('img/392501-256.png') }}" height="80">
                                    <h3>Beauty</h3>
                                    <p>Nam sollicitudin tellus id neque blandit faucibus. In quis congue felis. Suspendisse eget mi justo. Mauris tincidunt purus metus, eu sagittis libero fringilla id. Sed fringilla malesuada aliquet.</p>
                                    <br><br>
                                </center>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <br><img src="{{ asset('img/392494-256.png') }}" height="80">
                                    <h3>Easy</h3>
                                    <p>Nam sollicitudin tellus id neque blandit faucibus. In quis congue felis. Suspendisse eget mi justo. Mauris tincidunt purus metus, eu sagittis libero fringilla id. Sed fringilla malesuada aliquet.</p>
                                    <br><br>
                                </center>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <br><img src="{{ asset('img/392498-256.png') }}" height="80">
                                    <h3>Direct</h3>
                                    <p>Nam sollicitudin tellus id neque blandit faucibus. In quis congue felis. Suspendisse eget mi justo. Mauris tincidunt purus metus, eu sagittis libero fringilla id. Sed fringilla malesuada aliquet.</p>
                                    <br><br>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /panel-->
            <br><br>
        </div>
    </body>
</html>
