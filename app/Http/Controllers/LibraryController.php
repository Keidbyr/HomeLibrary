<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::with('owner')->get();
        return view('libraries.index', compact('libraries'));
    }

    public function show($id)
    {
        $library = Library::with('owner', 'copies.book')->findOrFail($id);
        return view('libraries.show', compact('library'));
    }
}
