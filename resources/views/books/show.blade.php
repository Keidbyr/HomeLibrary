@extends('layouts.app')

@section('title', 'Книга')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Книга: {{ $book->title }}</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Поле</th><th>Значение</th></tr>
                <tr><td>ID</td><td>{{ $book->id }}</td></tr>
                <tr><td>Название</td><td>{{ $book->title }}</td></tr>
                <tr><td>Автор (ID)</td><td>{{ $book->author }}</td></tr>
                <tr><td>Жанр</td><td>{{ $book->genre }}</td></tr>
                <tr><td>Дата</td><td>{{ $book->date }}</td></tr>
                <tr><td>Описание</td><td>{{ $book->discription }}</td></tr>
            </table>

            <h2 class="mt-4">Экземпляры (копии)</h2>
            @if($book->copies->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
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
                </div>
            @else
                <p class="text-muted">Нет копий этой книги.</p>
            @endif

            <div class="mt-3">
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">← Назад к списку книг</a>
            </div>
        </div>
    </div>
@endsection
