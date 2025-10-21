<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('copy.book', 'user')->get();
        return view('loans.index', compact('loans'));
    }

    public function show($id)
    {
        $loan = Loan::with('copy.book', 'user')->findOrFail($id);
        return view('loans.show', compact('loan'));
    }
}
