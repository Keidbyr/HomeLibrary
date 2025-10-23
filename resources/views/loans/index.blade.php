@extends('layouts.app')

@section('title', 'Выдача книги')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h1 class="h4 mb-0">Выдача #{{ $loan->id }}</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Поле</th>
                    <th>Значение</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $loan->id }}</td>
                </tr>
                <tr>
                    <td>Копия</td>
                    <td>
                        @if($loan->copy)
                            <a href="{{ route('copies.show', $loan->copy->id) }}" class="link-primary">Копия #{{ $loan->copy->id }}</a>
                        @else
                            <span class="text-muted">(Копия удалена)</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Читатель</td>
                    <td>
                        @if($loan->user)
                            <a href="{{ route('users.show', $loan->user->id) }}" class="link-primary">
                                {{ $loan->user->name }} {{ $loan->user->surname }}
                            </a>
                        @else
                            <span class="text-muted">(Читатель удалён)</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Дата выдачи (Unix)</td>
                    <td>{{ $loan->loan_date }}</td>
                </tr>
                <tr>
                    <td>Дата возврата (Unix)</td>
                    <td>{{ $loan->return_date }}</td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td>
                        @if($loan->status === 'active')
                            <span class="badge bg-success">Активна</span>
                        @elseif($loan->status === 'returned')
                            <span class="badge bg-secondary">Возвращена</span>
                        @elseif($loan->status === 'overdue')
                            <span class="badge bg-danger">Просрочена</span>
                        @elseif($loan->status === 'lost')
                            <span class="badge bg-dark">Утеряна</span>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('loans.index') }}" class="btn btn-outline-secondary">← Назад к списку выдач</a>
            </div>
        </div>
    </div>
@endsection
