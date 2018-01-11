@extends('layouts.admin')
@section('content')
    @include('inc.Messages')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Редактировать категорию</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Редактировать название категории: <br><input type="text" name="title" class="form-control" required value="{{$category->title}}"></p>
            <p>Редактировать текст категории: <br><textarea name="descriptions" class="form-control"></textarea>{{$category->descriptions}}</p>
            <button type="submit" class="btn-success" style="cursor: pointer">Изменить</button>
        </form>
    </main>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    @include('inc.Messages')
@stop