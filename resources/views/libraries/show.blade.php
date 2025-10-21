<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Библиотека #{{ $library->id }}</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Поле</th><th>Значение</th></tr>
    <tr><td>ID</td><td>{{ $library->id }}</td></tr>
    <tr><td>Владелец</td><td>
            @if($library->owner)
                <a href="{{ route('users.show', $library->owner->id) }}">
                    {{ $library->owner->name }} {{ $library->owner->surname }}
                </a>
            @else
                (Пользователь удалён)
            @endif
        </td></tr>
    <tr><td>Город</td><td>{{ $library->city }}</td></tr>
    <tr><td>Дата создания</td><td>{{ $library->date_creation }}</td></tr>
</table>

<a href="{{ route('libraries.index') }}"> Назад к списку библиотек</a>
</body>
</html>
