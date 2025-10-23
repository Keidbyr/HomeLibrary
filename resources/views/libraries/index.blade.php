@extends('layouts.app')

@section('title', 'Список библиотек')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h1 class="h4 mb-0">Список библиотек</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
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
                            <td><a href="{{ route('libraries.show', $library->id) }}" class="btn btn-sm btn-outline-info">Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
