@extends('layouts.app')

@section('title', 'Библиотека')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h1 class="h4 mb-0">Библиотека #{{ $library->id }}</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Поле</th><th>Значение</th></tr>
                <tr><td>ID</td><td>{{ $library->id }}</td></tr>
                <tr>
                    <td>Владелец</td>
                    <td>
                        @if($library->owner)
                            <a href="{{ route('users.show', $library->owner->id) }}" class="link-primary">
                                {{ $library->owner->name }} {{ $library->owner->surname }}
                            </a>
                        @else
                            <span class="text-muted">(Пользователь удалён)</span>
                        @endif
                    </td>
                </tr>
                <tr><td>Город</td><td>{{ $library->city }}</td></tr>
                <tr><td>Дата создания</td><td>{{ $library->date_creation }}</td></tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('libraries.index') }}" class="btn btn-outline-secondary">← Назад к списку библиотек</a>
            </div>
        </div>
    </div>
@endsection
