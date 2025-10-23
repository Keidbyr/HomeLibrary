<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class CopyController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('copies.index', ['copies' => Copy::paginate($perpage) -> withQueryString()]);
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
        $copy = Copy::find($id);
        if (!$copy) {
            abort(404);
        }
        if(!Gate::allows('change-copy', $copy)) {
            return redirect('/error')->with('message','У вас нет разрешения на Редактирование копии номер ' . $id);
        }
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
        return redirect()->route('copies.index')->with('success', 'Копия успешно изменена.');
    }
    public function showDestroyForm(Copy $copy)
    {
        return view('copies.destroy', compact('copy'));
    }
    public function destroy(string $id){
        $copy = Copy::find($id);
        if (!$copy) {
            abort(404);
        }
        if(!Gate::allows('destroy-copy', $copy)) {
            return redirect('/error')->with('message','У вас нет разрешения на удаление копии номер ' . $id);
        }
        Copy::destroy($id);
        return redirect()->route('copies.index')->with('success', 'Копия успешно удалена.');
    }
}
