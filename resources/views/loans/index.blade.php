<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Список выдач книг</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Копия ID</th>
        <th>Читатель ID</th>
        <th>Дата выдачи</th>
        <th>Дата возврата</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->id }}</td>
            <td>{{ $loan->copy_id }}</td>
            <td>{{ $loan->reader_id }}</td>
            <td>{{ $loan->loan_date }}</td>
            <td>{{ $loan->return_date }}</td>
            <td>{{ $loan->status }}</td>
            <td><a href="{{ route('loans.show', $loan->id) }}">Просмотр</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
