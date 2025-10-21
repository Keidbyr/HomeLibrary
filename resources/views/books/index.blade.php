<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Список книг</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор (ID)</th>
        <th>Жанр</th>
        <th>Дата публикации</th>
        <th>Описание</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->genre }}</td>
            <td>{{ $book->date }}</td>
            <td>{{ Str::limit($book->discription, 50) }}</td>
            <td><a href="{{ route('books.show', $book->id) }}">Просмотр</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>


