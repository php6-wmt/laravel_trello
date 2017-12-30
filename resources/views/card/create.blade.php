@extends('layouts.cardtemplate')
@section('title','Add Card')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>Add new Card</h2>
        </div>
        &nbsp;
    </div>
    <form action="{{ route('card.store',['id'=>$id]) }}" method="get">
        {{ csrf_field() }}
        <div class="row ">
            <div class="offset-md-2 col-md-8">
                <lable for="card_name">Enter Card Name</lable>
                <input type="text" name="card_name" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <button type="submit" class="btn btn-primary">Add Card</button>
                <a href="{{ route('card.index',['id'=>$id]) }}" class="btn btn-danger float-md-right">Go Back</a>
            </div>
        </div>
    </form>

    @endsection