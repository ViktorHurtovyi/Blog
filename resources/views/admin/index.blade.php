@extends('layouts.admin')
@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h1>Панель администратора</h1>
        
            
            @foreach($articles as $article)
            <table class="table table-bordered">
                <tr>
                <h1 class="container">  <lu>{{$article->title}}</lu></h1>
                <h3 class="container">  <lu>{{$article->short_text}}</lu></h3>
                <h3 class="container">  <lu>{{$article->author}}</lu></h3>
                <h6>  <lu>{{$article->created_at->format('d-m-y H:i ')}}</lu></h6>
                    </tr>
                    </table>
            @endforeach
            
</main>
@stop()