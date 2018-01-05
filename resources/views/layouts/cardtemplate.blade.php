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

    <style>
        {{--create card--}}
        h2 {
            color: white;
        }

        .labelclr {
            color: white;
        }
       .createbtncolor{
            background-color: transparent;
           color:white;
           font-size: 18px;
        }
.createbtncolor:hover{
    color:white;
}
        h1 {
            margin: 8px 18px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: white;

            font-family: 'Tangerine', serif;
        }

        nav {
            height: 70px;
            background-color: #3F51B5 !important;
            border-color: transparent;
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
            background-color: transparent;
            color: white;
            font-size: 18px;
            margin: 3px 10px;
        }

        h4 {
            font-size: 25px;
            color: #3F51B5;
            cursor: pointer;
            padding: 7px;
        }

        .hover {
            border: 1px solid #6573C3 !important;
            padding: 5px;
            color: #3F51B5 !important;
        }

        a.btn {
            background-color: transparent;
            border:none;
            color: white;
            font-size: 18px;
            margin: 8px 18px;
        }

        a.btn:focus {
            background-color: transparent !important;
            border: none !important;
            border-color: transparent;
        }

        a.btn:hover {
            background-color: transparent;
            border: none;
            color: white;

        }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            border: none;
            border-color: transparent;
        }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            background-color: transparent;
            color: white;
            border: none;
        }

        .navbar-default .navbar-nav > li > a, .navbar-default .navbar-text {
            color: white;
            margin: 3px 10px;
        }

        .navbar-default .navbar-nav > li > a:hover {
            color: white;
        }

        nav a {
            background-color: transparent;
            color: white;
            font-size: 18px;
        }

        .move {
            cursor: pointer;
        }

        .navbar-default {
            border-color: transparent;
        }

        html {
            height: 100%;
        }

        body {
            background-color: #3F51B5;
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
        }

        .card {

            margin: 10px 10px;
            box-shadow: 0 10px 45px #25306C;
        }

        .card-body li {
            margin: 0 !important;
            border: none;
            border-bottom: 1px solid rgba(216, 220, 240, 0.5) !important;
            padding: 15px 0px;
        }

        .card button {
            background-color: transparent;
        }

        .card-header {
            padding: 0px;
            margin: 0 !important;
            border: none;
            border-bottom: 0.5px solid #C5CAE8 !important;
        }

        .card-footer {
            margin: 0 !important;
            border: none;
            border-top: 1px solid #C5CAE8 !important;
        }

        .card-body {
            border-color: transparent;
        }

        .timeago {
            font-size: 14px;
            color: #3F51B5;

        }

        .additem {
            border: 0.5px solid #C5CAE8;
        }

        button i {
            color: #3F51B5;
        }

        h4 a {
            color: #3F51B5;
        }

        h4 a:hover {
            color: #121836;
            text-decoration-line: none
        }

        .round {
            position: relative;
            margin: 0 auto;
        }

        .round label {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            height: 28px;
            left: 0;
            position: absolute;
            top: 0;
            width: 28px;
        }

        .round label:after {
            border: 2px solid #fff;
            border-top: none;
            border-right: none;
            content: "";
            height: 6px;
            left: 7px;
            opacity: 0;
            position: absolute;
            top: 8px;
            transform: rotate(-45deg);
            width: 12px;
        }

        .round input[type="checkbox"] {
            visibility: hidden;
            margin-left: 38px;
        }

        .round input[type="checkbox"]:checked + label {
            background-color: #3F51B5;
            border-color: #3F51B5;
        }

        .round input[type="checkbox"]:checked + label:after {
            opacity: 1;

        }

        .round input[type="checkbox"]:checked ~ span {
            color: #a7a5a5;
            text-decoration: line-through;
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
                    <li class="nav-item">
                        <a class=" nav-link" href="{{ route('mainBoard.index') }}">MainBoard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Card</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-default float-md-right">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-default">Register</a>
                    @else
                        <div class="dropdown">
                            <a href="#" class="btn btn-default float-md-right" data-toggle="dropdown"
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
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"--}}
{{--integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"--}}
{{--crossorigin="anonymous"></script>--}}

{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"--}}
{{--integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"--}}
{{--crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/vendor/humanreadable/time-ago-in-words.min.js"></script>
<script src="/js/vendor/jquery.ui.touch-punch.min.js"></script>

@yield('script')
</body>
</html>