@extends('layouts.app')

@section('title', 'Копии книг')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Создание копии</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('copies') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Книга:</label>
                    <select name="book_id" class="form-select @error('book_id') is-invalid @enderror">
                        <option value="">-- Выберите книгу --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}"
                                    @if(old('book_id') == $book->id) selected @endif>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Библиотека:</label>
                    <select name="library_id" class="form-select @error('library_id') is-invalid @enderror">
                        <option value="">-- Выберите библиотеку --</option>
                        @foreach ($libraries as $lib)
                            <option value="{{ $lib->id }}"
                                    @if(old('library_id') == $lib->id) selected @endif>
                                {{ $lib->owner_reader_id }} {{ $lib->city }}
                            </option>
                        @endforeach
                    </select>
                    @error('library_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="integrity" value="0">
                    <input class="form-check-input" type="checkbox" name="integrity" value="1"
                           id="integrity_create"
                        {{ old('integrity') ? 'checked' : '' }}>
                    <label class="form-check-label" for="integrity_create">
                        Целостность (в хорошем состоянии)
                    </label>
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="in_stock" value="0">
                    <input class="form-check-input" type="checkbox" name="in_stock" value="1"
                           id="in_stock_create"
                        {{ old('in_stock') ? 'checked' : '' }}>
                    <label class="form-check-label" for="in_stock_create">
                        В наличии
                    </label>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <a href="{{ route('copies.index') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection
