<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index()
    {
        $copies = Copy::with('book', 'library')->get();
        return view('copies.index', compact('copies'));
    }

    public function show($id)
    {
        $copy = Copy::with('book', 'library')->findOrFail($id);
        return view('copies.show', compact('copy'));
    }

    public function create()
    {
        return view('copies.create', ['books' => Book::all(), 'libraries' => Library::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'library_id' => 'required|exists:libraries,id',
            'integrity' => 'required|boolean',
            'in_stock' => 'required|boolean',
        ], [
            'book_id.exists' => 'Выбранная книга не существует.',
            'library_id.exists' => 'Выбранная библиотека не существует.',
        ]);
        $copy = new Copy($validated);
        $copy->save();
        return redirect('/copies');
    }

    public function edit(string $id)
    {
        return view('copies.edit', ['copy'=>Copy::all()->where('id',$id)->first(), Library::all(), 'books' => Book::all(), 'libraries' => Library::all()]);
    }
    public function update(Request $request, string $id){
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'library_id' => 'required|exists:libraries,id',
            'integrity' => 'required|boolean',
            'in_stock' => 'required|boolean',
        ], [
            'book_id.exists' => 'Выбранная книга не существует.',
            'library_id.exists' => 'Выбранная библиотека не существует.',
        ]);
        $copy = Copy::all()->where('id',$id)->first();
        $copy->book_id = $validated['book_id'];
        $copy->library_id = $validated['book_id'];
        $copy->integrity = $validated['integrity'];
        $copy->in_stock = $validated['in_stock'];
        $copy->save();
        return redirect('/copies');
    }
    public function showDestroyForm(Copy $copy)
    {
        return view('copies.destroy', compact('copy'));
    }
    public function destroy(string $id){
        Copy::all()->where('id',$id)->first()->delete();
        return redirect('/copies');
    }
}
