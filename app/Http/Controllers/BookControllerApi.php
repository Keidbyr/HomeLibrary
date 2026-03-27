<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class BookControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Book::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }
    public function total()
    {
        return response(Book::all()->count());
    }
    public function show($id)
    {
        return response()->json(Book::find($id));
    }
}
