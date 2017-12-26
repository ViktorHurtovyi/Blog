<h2>Добро пожаловать, {{\Auth::user()->email}}</h2>

<br>
@if(\Auth::user()->isAdmin ==1)
    <a href="{{route('admin')}}">Войти как администратор</a>
        @endif
<br>
<a href="{{ route('logout') }}">Выйти</a>