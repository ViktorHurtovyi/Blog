@extends('layouts.admin')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Панель администратора</h1>


    @foreach($articles as $article)
        <table class="table table-bordered">
            <tr>
                <a href="{!! route('article.full', ['id' => $article->id]) !!}" class="text-success"><h2 class="container col-sm-9 ml-sm-auto col-md-4 pt-6">  <lu>{{$article->title}}</lu></h2> </a>
                <h4 class="container">  <lu>{{$article->short_text}}</lu></h4>
                <a href="{!! route('article.author', ['author' => $article->author]) !!}"><h6 class="container col-sm-9 ml-sm-auto col-md-10 pt-9"> Автор: {{$article->author}}</h6></a>
            </tr>
        </table>
    @endforeach

</main>
@stop()