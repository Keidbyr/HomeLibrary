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
}
