<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Copy;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class CopyControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Copy::all());
    }

    public function show($id)
    {
        return response()->json(Copy::find($id));
    }





    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'library_id' => 'required|exists:libraries,id',
            'integrity' => 'required|boolean',
            'in_stock' => 'required|boolean',
        ]);

        $copy = Copy::create($validated);
        return response()->json($copy, 201);
    }

    public function update(Request $request, $id)
    {
        $copy = Copy::findOrFail($id);

        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'library_id' => 'required|exists:libraries,id',
            'integrity' => 'required|boolean',
            'in_stock' => 'required|boolean',
        ]);

        $copy->update($validated);
        return response()->json($copy);
    }

    public function destroy($id)
    {
        $copy = Copy::findOrFail($id);
        $copy->delete();
        return response()->json(null, 204);
    }
}
