@extends('layouts.mainboardtemplate')
@section('title','Main Board')
@section('content')



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