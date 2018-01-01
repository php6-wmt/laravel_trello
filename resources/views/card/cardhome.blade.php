@extends('layouts.cardtemplate')
@section('title','Card')
@section('content')


    <div class="header">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mainBoard.index') }}">MainBoard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Card</a>
                </li>
            </ul>

            <!-- Authentication Links -->
            <div>
                @guest

                    <a href="{{ route('login') }}" class="btn btn-default float-md-right">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-default">Register</a>
                @else
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-default float-md-right" data-toggle="dropdown"
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
            </div>
        </nav>
    </div>
    <div align="center">
        <h1>Welcome to Card</h1>
    </div>

    <div class="row">

        @foreach($displayCard as $card)
            <div class="col-sm-3">

                <div class="card text center">

                    <h4 class="card-header text-center"
                        id="main">{{ $card->card_name }}</h4>

                    <div class="card-body">
                        <div class="card1">
                            <div class="sort">
                                <ul id="{{ $card->id }}" class="task list-group" style="list-style-type:none">
                                    @foreach($card->task as $task)

                                        <li id="{{ $task->id }}" class="edtspn card-body list-group-item">
                                            <div class="round">

                                                <input type="checkbox"
                                                       id="{{ $task->id }}  checkbox" {{$task->task_status ? 'checked': ''}}>
                                                <label for="{{ $task->id }} checkbox"></label>
                                                <span class="editspan">{{$task->task_content }}</span>
                                                <!-- Example single danger button -->

                                                <a href="{{ route('card.deletetask',['id'=>$task->id]) }}"
                                                   class="float-md-right">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>

                                                <button data-type="edit" value="{{ $task->task_content }}"
                                                        id="{{ $task->id }}" class="editbtn btn-sm float-md-right">
                                                    <i class="fa fa-pencil fa-fw"></i>
                                                </button>
                                            </div>
                                        </li>


                                    @endforeach
                                </ul>
                            </div>
                            &nbsp;
                        </div>
                        <form class="myform" method="get">
                            {{ csrf_field() }}

                            <input type="hidden" name="card_id" id="cardid" value="{{ $card->id }}">
                            <input data-id="{{ $card->id }}" class="additem col-12" name="task_name" id="item"
                                   type="text">

                        </form>
                    </div>
                    <div class="timeago card-footer text-muted"
                         title="{{ $card->created_at }}">{{ $card->created_at }}</div>
                </div>
            </div>
        @endforeach

        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"><a href="{{ route('card.add', ['id'=>$id]) }}">
                            +Add Card</a></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        $(".timeago").timeago();

        $(".additem").keypress(function (e) {
            if (e.which === 13) {
                var item = $(this).closest('form').serialize();
                // console.log(item);
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ route('card.taskstore') }}",
                    data:
                        {
                            array: item,
                            id: "{{ $id }}"
                        },
                    success: function () {
                        location.reload();
                    }
                })
            }
        });

        $(function () {
            $(".task, .card1").sortable({
                connectWith: ".task, .card1",
                receive: function (event, ui) {
                    var card_id = $(this).attr('id'); //cardid

                    var task_id = ui.item.attr('id');
                    // console.log(card_id,task_id);
                    $.ajax({
                        url: "{{  route('card.updatetask')}}",
                        data: {
                            card_id: `${card_id}`,
                            task_id: `${task_id}`
                        }

                    })
                }
            }).disableSelection();


            $('input[type="checkbox"]').click(function () {
                if ($(this).is(":checked")) {

                    var task_id = $(this).attr('id');
                    // console.log(task_id);
                    $.ajax({
                        url: "{{ route('card.updatestatus') }}",
                        data: {
                            status: '1',
                            task_id: `${task_id}`
                        }

                    })
                }
                else if ($(this).is(":not(:checked)")) {

                    var task_id = $(this).attr('id');
                    // console.log(task_id);
                    $.ajax({
                        url: "{{ route('card.updatestatus') }}",
                        data: {
                            status: '0',
                            task_id: `${task_id}`
                        }

                    })
                }
            });
        });

        $('.editbtn').on('click', function () {
            var editbtnid = $(this).attr('id');
            var p = $(this).closest('li');
            var editcontent = p.find('span').text();
            var attrbtn = $('button').attr('data-type');
            console.log(editbtnid);
            console.log(editcontent);
            console.log(attrbtn);
            switch (attrbtn) {
                case 'edit':
                    $(editbtnid,'.editbtn').attr('data-type', 'save').text("<i class=\"fa fa-floppy-o\"></i>");
                    $(editbtnid,'.edtspn').attr('contenteditable', 'true');
                    break;
                case 'save':
                    $(editbtnid,'.editbtn').attr('data-type', 'edit').text("<i class=\"fa fa-pencil fa-fw\"></i>");
                    $(editbtnid,'.edtspn').attr('contenteditable', 'false');
                    {{--$.ajax({--}}
                        {{--type:'get',--}}
                        {{--url: '{{ route(' card.updatetaskcontent') }}',--}}
                        {{--data: {--}}
                            {{--task_id: `${editbtnid}`,--}}
                            {{--task_content: `${editcontent}`--}}
                        {{--}--}}
                    {{--})--}}
                    break;
            }
        });
    </script>
@endsection