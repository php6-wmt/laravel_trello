@extends('layouts.mainboardtemplate')
@section('title','Add new board')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>Add new board</h2>
        </div>
        &nbsp;
    </div>
    <form action="{{ route('mainBoard.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row ">
            <div class="offset-md-2 col-md-8">
                <lable for="board_name">Enter board Name</lable>
                <input type="text" name="board_name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <button type="submit" class="btn btn-primary">Add Board</button>
                <a href="{{ route('mainBoard.index') }}" class="btn btn-danger float-md-right">Go Back</a>
            </div>
        </div>
    </form>

@endsection