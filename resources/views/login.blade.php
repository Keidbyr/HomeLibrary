@extends('layouts.app')

@section('title', 'Копии книг')

@section('content')
    @if($user)
        <div class="text-center mb-4">
            <h2 class="text-success">Здравствуйте, {{ $user->name }}!</h2>
            <a href="logout" class="btn btn-outline-danger">Выйти из системы</a>
        </div>
    @else
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 400px;">
            <h2 class="text-center mb-4">Вход в систему</h2>
            <form method="post" action="{{ url('auth') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text"
                           name="email"
                           id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control @error('password') is-invalid @enderror"
                           value="{{ old('password') }}-" />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <input type="submit" class="btn btn-primary" value="Войти">
                </div>

                @error('error')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </form>
        </div>
    @endif
@endsection
