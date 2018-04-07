@extends('layouts.accaunt')
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

<br>
    @foreach($articles as $article)
        <table class="table table-bordered">
            <tr>
             <h1 class="text-success container col-sm-9 ml-sm-auto col-md-6 pt-9">  <lu>{{$article->title}}</lu></h1>
                <p class="container">  <lu>{{$article->full_text}}</lu></p>
                </br>
                <a href="{!! route('article.author', ['author' => $article->author]) !!}"><h6 class="container col-sm-9 ml-sm-auto col-md-10 pt-9"> Автор: {{$article->author}}</h6></a>
            </tr>
        </table>
    @endforeach
    <form method="post">
        {!! csrf_field() !!}
        Добавить комментарий: <textarea name="comment" class="form-control"></textarea></br>
        <input type="text" name="name" value={{\Auth::user()->email}}></br></br>
        <button type="submit" class="btn-success" style="cursor: pointer">Добавить</button>
    </form>
</main>