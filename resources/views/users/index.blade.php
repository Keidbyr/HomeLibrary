<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Список читателей</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Дата рождения</th>
        <th>Лимит книг</th>
        <th>Репутация</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->date_of_birth }}</td>
            <td>{{ $user->limit_of_books }}</td>
            <td>{{ $user->reputation }}</td>
            <td><a href="{{ route('users.show', $user->id) }}">Просмотр</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
