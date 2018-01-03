@extends('layouts.cardtemplate')
@section('title','Card')
@section('content')

    <div class="row">

        @foreach($displayCard as $card)
            <div class="col-sm-3">

                <div class="card">
                    <div class="card-header text-center">
                        <h4 id="{{ $card->id }}" class="editcard">
                            {{ $card->card_name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mycard">

                                <ul id="{{ $card->id }}" class="task list-group" style="list-style-type:none">
                                    @foreach($card->task as $task)

                                        <li id="{{ $task->id }}" class="hoverelement move list-group-item">
                                            <div class="round">

                                                <input type="checkbox"
                                                       id="{{ $task->id }}_checkbox" {{$task->task_status ? 'checked': ''}}>
                                                <label for="{{ $task->id }}_checkbox"></label>
                                                <span class="editspan"
                                                >{{$task->task_content }}</span>
                                                {{--delete btn--}}
                                                <button id="{{ $task->id }}"
                                                        class="btn deletebtn btn-sm float-md-right">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                                {{--edit button--}}
                                                <button data-type="edit"
                                                        id="{{ $task->id }}" class="btn editbtn btn-sm float-md-right">
                                                    <i class="fa fa-pencil fa-fw"></i>
                                                </button>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>


                        </div>
                        <form class="myform" method="get">
                            {{ csrf_field() }}

                            <input type="hidden" name="card_id" id="cardid" value="{{ $card->id }}">
                            <input data-id="{{ $card->id }}" class="additem col-12" name="task_name" id="item"
                                   type="text">

                        </form>
                    </div>
                    <div class="card-footer text-muted">
                    <div class="timeago"
                         title="{{ $card->created_at }}">{{ $card->created_at }}
                    </div>
                    </div>
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

        $(document).ready(function () {


            $(".timeago").timeago();

            $(".editcard").on('click', function () {

                $(this).attr('contenteditable', 'true').focus();
                var card_id = $(this).attr('id');

            });
            $(".editcard").focusout(function () {
                var card_id = $(this).attr('id');
                var card_name = $(this).text();
                $(this).attr('contenteditable', 'false');
                console.log(card_name);
                $.ajax({
                    type: 'get',
                    url: '{{ route('card.updatecardcontent') }}',
                    data:
                        {
                            card_id: `${card_id}`,
                            card_name: `${card_name}`
                        }
                })
            })


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


            $(".task, .mycard").sortable({
                connectWith: ".task, .mycard",
                cancel: 'span',
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
            })


            $('input[type="checkbox"]').click(function () {
                if ($(this).is(":checked")) {

                    var task_id = $(this).attr('id');
                    console.log(task_id);
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


            $('.editbtn').on('click', function () {

                var editBtnId = $(this).attr('id');
                var btn = $(this).closest('button');
                var p = $(this).closest('li');
                var editcontent = p.find('span');
                var editTaskContent = p.find('span').text();
                var attrBtn = $(btn).attr('data-type');
                console.log(editBtnId);
                console.log(editcontent);
                console.log(attrBtn);
                console.log(btn);
                $(editcontent).toggleClass('hover');
                switch (attrBtn) {
                    case 'edit':
                        $(btn).attr('data-type', 'save').html('<i class="fa fa-floppy-o" aria-hidden="true"></i>');
                        $(editcontent).attr('contentEditable', 'true');

                        break;
                    case 'save':
                        $(btn).attr('data-type', 'edit').html('<i class="fa fa-pencil fa-fw"></i>');
                        $(editcontent).attr('contentEditable', 'false');
                        $.ajax({
                            type: 'get',
                            url: '{{ route('card.updatetaskcontent') }}',
                            data: {
                                task_id: `${editBtnId}`,
                                task_content: `${editTaskContent}`
                            }
                        })
                        break;
                }
            });

            $('.deletebtn').on('click', function () {

                var task_id = $(this).attr('id');
                console.log(task_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('card.deletetask') }}',
                    data:
                        {
                            task_id: `${task_id}`
                        },
                    success: function () {
                        location.reload();
                    }
                })
            });
        });
    </script>
@endsection