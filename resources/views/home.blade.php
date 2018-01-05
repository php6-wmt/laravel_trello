@extends('layouts.mainboardtemplate')
@section('title','Main Board')
@section('content')
    <div class="row">
        @foreach($displayBoard as $board)
            <div class="col-sm-2">
                <div class="card-deck">
                <a href="{{ route('card.index', ['id'=>$board->id]) }}"
                   class="card card-body text-center">{{ $board->board_name }}</a>
                </div>
            </div>
        @endforeach
        <div class="col-sm-2">
            <a href="{{ route('mainBoard.add') }}" class="card card-body text-center">+Add Board</a>
        </div>
@endsection