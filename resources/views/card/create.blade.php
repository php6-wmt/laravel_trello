@extends('layouts.cardtemplate')
@section('title','Add Card')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>Add new Card</h2>
        </div>
        &nbsp;
    </div>
    <div class="col-md-offset-2 col-md-12">
    <form action="{{ route('card.store',['id'=>$id]) }}" method="get">
        {{ csrf_field() }}
        <div class="row ">
            <div class="col-md-8">
                <lable class="labelclr" for="card_name">Enter Card Name</lable><br>
                <input style="width: 100%" type="text" name="card_name">
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-md-8">
                <input type="submit" class="createbtncolor btn" value="Add Card">
                <a href="{{ route('card.index',['id'=>$id]) }}" class="btn float-md-right">Go Back</a>
            </div>
        </div>
    </form>
        <div class="col-md-offset-2 col-md-12">
    @endsection