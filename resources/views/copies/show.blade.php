<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Копия книги #{{ $copy->id }}</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Поле</th><th>Значение</th></tr>
    <tr><td>ID</td><td>{{ $copy->id }}</td></tr>
    <tr><td>Книга</td><td>
            @if($copy->book)
                <a href="{{ route('books.show', $copy->book->id) }}">{{ $copy->book->title }}</a>
            @else
                (Книга удалена)
            @endif
        </td></tr>
    <tr><td>Целостность</td><td>{{ $copy->integrity ? 'Да' : 'Нет' }}</td></tr>
    <tr><td>В наличии</td><td>{{ $copy->in_stock ? 'Да' : 'Нет' }}</td></tr>
    <tr><td>Библиотека</td><td>
            @if($copy->library)
                <a href="{{ route('libraries.show', $copy->library->id) }}">Библиотека #{{ $copy->library->id }}</a>
            @else
                (Библиотека удалена)
            @endif
        </td></tr>
</table>

<a href="{{ route('copies.index') }}"> Назад к списку копий</a>
</body>
</html>
