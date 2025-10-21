<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('copies')->get();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with('copies')->findOrFail($id);
        return view('books.show', compact('book'));
    }
}
