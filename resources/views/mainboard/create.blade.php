@extends('layouts.mainboardtemplate')
@section('title','Add new board')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>Add new board</h2>
        </div>
        &nbsp;
    </div>
    <div class="col-md-offset-2 col-md-12">
    <form action="{{ route('mainBoard.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row ">
            <div class="col-md-8">
                <lable class="labelclr" for="board_name">Enter board Name</lable>
                <input style="width: 100%" type="text" name="board_name">
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-md-8">
                <input type="submit" class="createbtncolor btn" value="Add Board">
                <a href="{{ route('mainBoard.index') }}" class="btn float-md-right">Go Back</a>
            </div>
        </div>
    </form>
    </div>
@endsection