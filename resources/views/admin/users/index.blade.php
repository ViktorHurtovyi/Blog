@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список Пользователей</h1>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>почта</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($users as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->created_at->format('d-m-y H:i ')}}</td>
                    <td><a href="javascript:;" class="delete" rel="{{$users->id}}">Удалить</a></td>
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
                    let idd = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('users.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:idd},
                        complete: function () {
                            alert("Категория удалена");
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