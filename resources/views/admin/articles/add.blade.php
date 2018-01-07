@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Добавить Статью</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор категорий: <br><select name="categories[] " class="list-group"  multiple>
                    @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                </select></p>
            <p>Введите название статьи: <br><input type="text" name="title" class="form-control" required></p>
            <p>Введите автора статьи: <br><input type="text" name="author" class="form-control" required></p>
            <p>Текст описания статьи: <br><textarea name="short-text" class="form-control"></textarea></p>
            <p>Текст статьи: <br><textarea name="full-text" class="form-control"></textarea></p>
            <button type="submit" class="btn-success" style="cursor: pointer">Добавить</button>
        </form>
    </main>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    @include('inc.Messages')
@stop