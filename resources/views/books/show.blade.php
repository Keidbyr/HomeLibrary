<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Книга: {{ $book->title }}</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <tr><th>Поле</th><th>Значение</th></tr>
    <tr><td>ID</td><td>{{ $book->id }}</td></tr>
    <tr><td>Название</td><td>{{ $book->title }}</td></tr>
    <tr><td>Автор (ID)</td><td>{{ $book->author }}</td></tr>
    <tr><td>Жанр</td><td>{{ $book->genre }}</td></tr>
    <tr><td>Дата</td><td>{{ $book->date }}</td></tr>
    <tr><td>Описание</td><td>{{ $book->discription }}</td></tr>
</table>

<h2>Экземпляры (копии)</h2>
@if($book->copies->count())
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
        <tr>
            <th>ID копии</th>
            <th>Целостность</th>
            <th>В наличии</th>
            <th>Библиотека ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach($book->copies as $copy)
            <tr>
                <td>{{ $copy->id }}</td>
                <td>{{ $copy->integrity ? 'Да' : 'Нет' }}</td>
                <td>{{ $copy->in_stock ? 'Да' : 'Нет' }}</td>
                <td>{{ $copy->library_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Нет копий этой книги.</p>
@endif

<a href="{{ route('books.index') }}">Назад к списку книг</a>

</body>
</html>
