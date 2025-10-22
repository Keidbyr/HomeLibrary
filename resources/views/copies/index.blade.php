<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Список копий</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Книга ID</th>
        <th>Целостность</th>
        <th>В наличии</th>
        <th>Библиотека ID</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($copies as $copy)
        <tr>
            <td>{{ $copy->id }}</td>
            <td>{{ $copy->book_id }}</td>
            <td>{{ $copy->integrity ? 'Да' : 'Нет' }}</td>
            <td>{{ $copy->in_stock ? 'Да' : 'Нет' }}</td>
            <td>{{ $copy->library_id }}</td>
            <td>
                <a href="{{ route('copies.destroy', $copy) }}">Удалить</a>
                <a href="{{route('copies.edit', $copy->id)}}">Редактировать</a>
            </td>
            <td><a href="{{ route('copies.show', $copy->id) }}">Просмотр</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form method="get" action="{{url('copies')}}">
    <select name="perpage">
        <option value="2" @if($copies->perPage()== 2) selected @endif>2</option>
        <option value="3" @if($copies->perPage()== 3) selected @endif>3</option>
        <option value="4" @if($copies->perPage()== 4) selected @endif>4</option>
    </select>
    <input type="submit" value="Изменить">
</form>
{{ $copies->links() }}
<a href="{{ route('copies.create') }}">Добавить копию</a>
</body>
</html>

