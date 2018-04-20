@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список Пользователей</h1>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>Имя</th>
                <th>Текст Комментария</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->text}}</td>
                    <td>{{$comment->created_at->format('d-m-y H:i ')}}</td>
                    <td><a href="javascript:;" class="delete" rel="{{$comment->id}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
    @include('inc.Messages')
@stop
@section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                if(confirm("Вы действительно хотите удалить запись?")){
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('comments.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function () {
                            alert("Комментарий удален");
                            location.reload();
                        }
                    })
                }else{
                    alertify.error("Действие отменено пользователем");
                }
            });
        });
    </script>
@stop