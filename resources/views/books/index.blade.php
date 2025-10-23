@extends('layouts.app')

@section('title', 'Список книг')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Список книг</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
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
                            <td><a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-info">Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
