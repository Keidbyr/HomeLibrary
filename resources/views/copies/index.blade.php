@extends('layouts.app')

@section('title', 'Список копий')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Список копий</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Книга ID</th>
                        <th>Целостность</th>
                        <th>В наличии</th>
                        <th>Библиотека ID</th>
                        <th>Действия</th>
                        <th>Просмотр</th>
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
                                <a href="{{ route('copies.destroy', $copy) }}" class="text-danger" onclick="return confirm('Удалить?')">Удалить</a>
                                <a href="{{ route('copies.edit', $copy->id) }}" class="text-warning ms-2">Редактировать</a>
                            </td>
                            <td><a href="{{ route('copies.show', $copy->id) }}">Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <form method="get" action="{{ url('copies') }}" class="row g-2 align-items-center mt-3">
                <div class="col-auto">
                    <label for="perpage" class="form-label mb-0">Записей на странице:</label>
                </div>
                <div class="col-auto">
                    <select name="perpage" id="perpage" class="form-select form-select-sm">
                        <option value="2" @if($copies->perPage() == 2) selected @endif>2</option>
                        <option value="3" @if($copies->perPage() == 3) selected @endif>3</option>
                        <option value="4" @if($copies->perPage() == 4) selected @endif>4</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="submit" value="Изменить" class="btn btn-outline-secondary btn-sm">
                </div>
            </form>
            <div class="mt-3">
                {{ $copies->links() }}
            </div>
            <div class="mt-3">
                <a href="{{ route('copies.create') }}" class="btn btn-success">Добавить копию</a>
            </div>
        </div>
    </div>
@endsection
