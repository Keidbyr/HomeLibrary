@extends('layouts.app')

@section('title', 'Копии книг')

@section('content')
<h1>Читатель: {{ $user->name }} {{ $user->surname }}</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Поле</th><th>Значение</th></tr>
    <tr><td>ID</td><td>{{ $user->id }}</td></tr>
    <tr><td>Фамилия</td><td>{{ $user->surname }}</td></tr>
    <tr><td>Имя</td><td>{{ $user->name }}</td></tr>
    <tr><td>Дата рождения</td><td>{{ $user->date_of_birth }}</td></tr>
    <tr><td>Лимит книг</td><td>{{ $user->limit_of_books }}</td></tr>
    <tr><td>Репутация</td><td>{{ $user->reputation }}</td></tr>
</table>

<h2>Библиотеки в собственности</h2>
@if($user->libraries->count())
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
        <tr><th>ID</th><th>Город</th><th>Дата создания</th></tr>
        </thead>
        <tbody>
        @foreach($user->libraries as $lib)
            <tr>
                <td>{{ $lib->id }}</td>
                <td>{{ $lib->city }}</td>
                <td>{{ $lib->date_creation }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Не владеет ни одной библиотекой.</p>
@endif

<h2>Арендованные копии</h2>
@if($user->copies->count())
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
        <tr>
            <th>Книга</th>
            <th>Статус</th>
            <th>Дата выдачи</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->copies as $copy)
            <tr>
                <td>{{ $copy->book->title ?? 'Книга удалена' }}</td>
                <td>{{ $copy->pivot->status }}</td>
                <td>{{ $copy->pivot->loan_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Нет активных арендованных копий.</p>
@endif

<a href="{{ route('users.index') }}"> Назад к списку читателей</a>
@endsection
