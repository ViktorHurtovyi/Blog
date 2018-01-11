@extends('layouts.admin')
@section('content')
    @include('inc.Messages')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Редактировать Статью</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Редактировать название статьи: <br><input type="text" name="title" class="form-control" required value="{{$articles->title}}"></p>
            <p>Редактировать описание статьи: <br><textarea name="short_text" class="form-control"></textarea>{{$articles->short_text}}</p>
            <p>Редактировать текст статьи: <br><textarea name="full_text" class="form-control"></textarea>{{$articles->full_text}}</p>
            <button type="submit" class="btn-success" style="cursor: pointer">Изменить</button>
        </form>
    </main>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    @include('inc.Messages')
@stop