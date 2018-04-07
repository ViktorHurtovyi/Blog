@extends('layouts.accaunt')
@section('contentik')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список категорий</h1>

      <table class="table table-bordered">
          <tr>
              <th>#</th>
              <th>Наименование</th>
              <th>Описание</th>
              <th>Дата добавления</th>
              <th>Действие</th>
          </tr>
          @foreach($categories as $category)
              <tr>
              <td>{{$category->id}}</td>
             <a href="{!! route('category.search', ['name' => $category->id]) !!}"> <td>{{$category->title}}</td></a>
              <td>{{$category->descriptions}}</td>
              <td>{{$category->created_at->format('d-m-y H:i ')}}</td>
              <td><a href="">Поиск по этой категории</a>
              </tr>
              @endforeach
      </table>
    </main>
