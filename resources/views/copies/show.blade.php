@extends('layouts.app')

@section('title', 'Копия книги')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h1 class="h4 mb-0">Копия книги #{{ $copy->id }}</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Поле</th><th>Значение</th></tr>
                <tr><td>ID</td><td>{{ $copy->id }}</td></tr>
                <tr>
                    <td>Книга</td>
                    <td>
                        @if($copy->book)
                            <a href="{{ route('books.show', $copy->book->id) }}" class="link-primary">{{ $copy->book->title }}</a>
                        @else
                            <span class="text-muted">(Книга удалена)</span>
                        @endif
                    </td>
                </tr>
                <tr><td>Целостность</td><td>{{ $copy->integrity ? 'Да' : 'Нет' }}</td></tr>
                <tr><td>В наличии</td><td>{{ $copy->in_stock ? 'Да' : 'Нет' }}</td></tr>
                <tr>
                    <td>Библиотека</td>
                    <td>
                        @if($copy->library)
                            <a href="{{ route('libraries.show', $copy->library->id) }}" class="link-primary">Библиотека #{{ $copy->library->id }}</a>
                        @else
                            <span class="text-muted">(Библиотека удалена)</span>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('copies.index') }}" class="btn btn-outline-secondary">← Назад к списку копий</a>
            </div>
        </div>
    </div>
@endsection
