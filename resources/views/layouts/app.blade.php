<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .authheading{
            margin-left: 237px;
            color: #FFFFFF;
            font-size: 50px;
            padding: 20px;
        }
        html{
            height: 100%;
        }
        body{
            font-family: 'Roboto', sans-serif!important;
            background-color: #3F51B5;
        }
        nav {
            margin:0 auto;
            font-size: 20px;
            padding: 10px;
        }
        .navbar-default{
            background-color: #3F51B5 !important;
        }
        .fontcolorbtn{
            margin: 10px 10px;
            background-color: transparent;
            border: none;
            color:white!important;
        }

        .fontcolorbtn:hover{
            color: white !important;
           background-color: transparent;
       }
        .navbar
        {
            border:none;
        }
        .panel-default{
            background-color: transparent;
            margin-top: 20px;
            border: none;

        }
        .auth{
            background-color: transparent!important;
            /*font-size: 20px;*/

        }
        .fontcolor{
            color:white!important;
        }
        .fontcolor:hover{
            color: white!important;
        }
        form label{
            font-size: 15px;
            color: #ffffff;
        }
        .panel-default>.panel-heading{
            border-bottom: 0.5px solid #B2B9E1;
        }
        .form-control{
            border: 0.5px solid #C5CAE8;
        }
        button{
            font-size: 20px;
            color: #ffffff;
            border-color:white!important;
            background-color:transparent !important;
        }
        button:hover{
            color: #ffffff;
        }
        div a{
            color: white!important;
        }
        div a:hover{
            text-decoration: none!important;
            color:#ffffff!important;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class=" nav-item">
                            <a class="fontcolor nav-brand" href="{{ route('home') }}">Home</a>
                        </li>

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <a href="{{ route('login') }}" class="fontcolorbtn btn btn-default float-md-right">Login</a>
                            <a href="{{ route('register') }}" class="fontcolorbtn btn btn-default float-md-right">Register</a>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
