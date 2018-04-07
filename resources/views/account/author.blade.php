@extends('layouts.accaunt')
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

    @foreach($articles as $article)
        <table class="table table-bordered">
            <tr>
                <a href="{!! route('article.full', ['id' => $article->id]) !!}" class="text-success"><h2 class="container col-sm-9 ml-sm-auto col-md-4 pt-6">  <lu>{{$article->title}}</lu></h2> </a>
                <h4 class="container">  <lu>{{$article->short_text}}</lu></h4>
            </tr>
        </table>
    @endforeach
</main>