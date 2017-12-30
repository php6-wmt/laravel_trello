@extends('layouts.mainboardtemplate')
@section('title','Main Board')
@section('content')


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">MainBoard</a>
            </li>

        </ul>

    <!-- Authentication Links -->
    <div>
    @guest

       <a href="{{ route('login') }}" class="btn btn-default float-md-right">Login</a>
        <a href="{{ route('register') }}" class="btn btn-default">Register</a>
    @else
        <div class="dropdown">
            <a href="#" class="dropdown-toggle btn btn-default float-md-right" data-toggle="dropdown" role="button"
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

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    @endguest
    </div>
    </nav>
    <div align="center">
        <h1>Welcome To Trello</h1>
    </div>

    <div class="row">
        @foreach($displayBoard as $board)
            <div class="col-sm-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center"><a
                                    href="{{ route('card.index', ['id'=>$board->id]) }}">{{ $board->board_name }}</a></h4>

                    </div>
                </div>
            </div>

        @endforeach

        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"><a href="{{ route('mainBoard.add') }}">+Add Board</a></h4>
                </div>
            </div>
        </div>
    </div>
@endsection