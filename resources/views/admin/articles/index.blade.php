@extends('layouts.admin')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список Статей</h1>
        <br>
        <a href="articles/add" class="btn btn-info">Добавить статью</a>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Автор</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->author}}</td>
                    <td>{{$article->created_at->format('d-m-y H:i ')}}</td>
                    <td><a href="{!! route('categories.edit', ['id' => $article->id]) !!}">Редактировать</a>||
                        <a href="javascript:;" class="delete" rel="{{$article->id}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
    @include('inc.Messages')
@stop
@section('js')

@stop