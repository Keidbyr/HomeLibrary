<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Список библиотек</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Владелец (ID)</th>
        <th>Город</th>
        <th>Дата создания</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($libraries as $library)
        <tr>
            <td>{{ $library->id }}</td>
            <td>{{ $library->owner_reader_id }}</td>
            <td>{{ $library->city }}</td>
            <td>{{ $library->date_creation }}</td>
            <td><a href="{{ route('libraries.show', $library->id) }}">Просмотр</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
