@extends('layouts.app')

@section('title', 'Копии книг')

@section('content')
    <h2>{{ $message }}</h2>
    <a href="{{url('copies')}}">Назад</a>
@endsection
