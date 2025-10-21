<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
<h1>Изменение копии</h1>
<form action="{{ url('copies', $copy->id) }}" method="POST">
    @csrf
    @method('PUT')

    <br>
    <label>Книга:</label>
    <select name="book_id">
        <option value="">-- Выберите книгу --</option>
        @foreach ($books as $book)
            <option value="{{ $book->id }}"
                    @if(old('book_id', $copy->book_id) == $book->id) selected @endif>
                {{ $book->title }}
            </option>
        @endforeach
    </select>
    @error('book_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br><br>

    <label>Библиотека:</label>
    <select name="library_id">
        <option value="">-- Выберите библиотеку --</option>
        @foreach ($libraries as $lib)
            <option value="{{ $lib->id }}"
                    @if(old('library_id', $copy->library_id) == $lib->id) selected @endif>
                {{ $lib->city }} (владелец: {{ $lib->owner_reader_id }})
            </option>
        @endforeach
    </select>
    @error('library_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br>

    <div style="margin-top: 10px;">
        <input type="hidden" name="integrity" value="0">
        <label>
            <input type="checkbox" name="integrity" value="1"
                   @if(old('integrity', $copy->integrity)) checked @endif>
            Целостность (в хорошем состоянии)
        </label>
    </div>

    <div style="margin-top: 10px;">
        <input type="hidden" name="in_stock" value="0">
        <label>
            <input type="checkbox" name="in_stock" value="1"
                   @if(old('in_stock', $copy->in_stock)) checked @endif>
            В наличии
        </label>
    </div>

    <div style="margin-top: 15px;">
        <button type="submit">Сохранить</button>
        <a href="{{ route('copies.index') }}">Отмена</a>
    </div>
</form>
</body>
