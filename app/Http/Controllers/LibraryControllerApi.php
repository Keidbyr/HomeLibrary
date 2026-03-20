<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Library;

class LibraryControllerApi extends Controller
{
    public function index()
    {
        return response()->json(Library::all());
    }

    public function show($id)
    {

        return response()->json(Library::find($id));
    }
}
