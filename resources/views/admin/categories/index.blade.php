@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список категорий</h1>
        <br>
        <a href="categories/add" class="btn btn-info">Добавить категорию</a>
        <br><br><br>
      <table class="table table-bordered">
          <tr>
              <th>#</th>
              <th>Наименование</th>
              <th>Описание</th>
              <th>Дата добавления</th>
              <th>Действия</th>
          </tr>
          @foreach($categories as $category)
              <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->title}}</td>
              <td>{{$category->descriptions}}</td>
              <td>{{$category->created_at->format('d-m-y H:i ')}}</td>
              <td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}">Редактировать</a>||
                  <a href="javascript:;" class="delete" rel="{{$category->id}}">Удалить</a></td>
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
            url: "{!! route('categories.delete') !!}",
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