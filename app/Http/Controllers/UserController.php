<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::with('libraries')->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('libraries', 'copies.book')->findOrFail($id);
        return view('users.show', compact('user'));
    }
}
