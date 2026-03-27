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
        return response(Copy::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }
    public function total()
    {
        return response(Copy::all()->count());
    }

    public function show($id)
    {
        return response()->json(Copy::find($id));
    }
}
