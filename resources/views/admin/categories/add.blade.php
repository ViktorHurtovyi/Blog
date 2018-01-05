@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Добавить категорию</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
    <p>Введите название категории: <br><input type="text" name="title" class="form-control" required></p>
        <p>Текст категории: <br><textarea name="descriptions" class="form-control"></textarea></p>
        <button type="submit" class="btn-success" style="cursor: pointer">Добавить</button>
        </form>
    </main>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    @include('inc.Messages')
@stop