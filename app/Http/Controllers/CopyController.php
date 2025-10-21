<?php

namespace App\Http\Controllers;

use App\Models\Copy;
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
}
