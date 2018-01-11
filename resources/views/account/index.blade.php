@extends('layouts.accaunt')
<h2 class="col-sm-9 ml-sm-auto col-md-10 pt-3">Добро пожаловать, {{\Auth::user()->email}}</h2>

<br>
@if(\Auth::user()->isAdmin ==1)
    <a href="{{route('admin')}}">Войти как администратор</a>z
        @endif
<br>
<a href="{{ route('logout') }}">Выйти</a>