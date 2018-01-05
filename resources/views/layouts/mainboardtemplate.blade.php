<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{--bootstrap css--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        h1 {
            margin: 8px 18px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: white;

        }
        h2{
            color: white;
        }
        form lable{
            color: #FFFFFF;
        }
        html{
            height: 100%;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #3F51B5;
        }

        .labelclr {
            color: white;
        }
        nav {
            height: 70px;
            background-color: #3F51B5 !important;
        }
        a {
            color: white;
        }
        a:hover {
            color: white;
            text-decoration-line: none;
        }
        .card {
            color: #3F51B5;
            font-size: 20px;
            background-color: #FFFFFF;
            margin: 20px 0px;
            padding: 25px 15px;

        }

        .card:hover {
            border-left:7px solid #2c387e;
            color: #3F51B5;
            background-color: snow;
            /*box-shadow: 0 10px 45px #25306C;*/

        }
        /*card-dack{*/
            /*transition: all .3s,border-color .3s,transform .3s,-webkit-transform .3s;*/
        /*}*/
        /*.card-deck:hover{*/
            /*border-top: 7px solid #2c387e;*/
        /*}*/
        .row {

            margin: 10px;
        }

        a.btn {
            background-color: transparent;
            color: white;
            font-size: 18px;
            margin: 8px 18px;
        }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            background-color: transparent;
            color: white;
            border: none;
        }


        /*.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {*/
            /*background-color: transparent;*/
            /*color: white;*/
            /*border: none !important;*/
        /*}*/
        .createbtncolor{
            background-color: transparent;
            color:white;
            font-size: 18px;
        }
        .createbtncolor:hover{
            color:white;
        }
        a.btn:hover {
            border: none;
            color: white;
            text-decoration: none;
            background-color: transparent;
        }
        a.btn:focus{
            border:none!important;
        }
        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
            background-color: transparent;
            color: white;
            font-size: 18px;
            margin: 3px 10px;
        }

        .navbar-default {
            border: none !important;
        }
        .row a{
            text-align: center;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">


            <div class="collapse navbar-expand-sm navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item active"s>
                        <a class="navbar-brand" href="{{ route('home') }}">Trello</a>
                    </li>


                </ul>
                <ul class="nav navbar-nav">
                    <h1>Welcome To Trello</h1>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <a href="{{ route('login') }}" class="fontcolorbtn btn float-md-right">Login</a>
                        <a href="{{ route('register') }}" class="fontcolorbtn btn">Register</a>
                    @else
                        <div class="dropdown">
                            <a href="#" class="btn float-md-right" data-toggle="dropdown"
                               role="button"
                               aria-expanded="false"
                               aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>

        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
</div>


{{--bootstrap js--}}
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"--}}
{{--integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"--}}
{{--crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"--}}
{{--integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"--}}
{{--crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/vendor/humanreadable/time-ago-in-words.min.js"></script>
</body>
</html>