<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class BookControllerApi extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function show($id)
    {
        return response()->json(Book::find($id));
    }
}
