<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Выдача #{{ $loan->id }}</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Поле</th><th>Значение</th></tr>
    <tr><td>ID</td><td>{{ $loan->id }}</td></tr>
    <tr><td>Копия</td><td>
            @if($loan->copy)
                <a href="{{ route('copies.show', $loan->copy->id) }}">Копия #{{ $loan->copy->id }}</a>
            @else
                (Копия удалена)
            @endif
        </td></tr>
    <tr><td>Читатель</td><td>
            @if($loan->user)
                <a href="{{ route('users.show', $loan->user->id) }}">
                    {{ $loan->user->name }} {{ $loan->user->surname }}
                </a>
            @else
                (Читатель удалён)
            @endif
        </td></tr>
    <tr><td>Дата выдачи (Unix)</td><td>{{ $loan->loan_date }}</td></tr>
    <tr><td>Дата возврата (Unix)</td><td>{{ $loan->return_date }}</td></tr>
    <tr><td>Статус</td><td>{{ $loan->status }}</td></tr>
</table>

<a href="{{ route('loans.index') }}"> Назад к списку выдач</a>
</body>
</html>
