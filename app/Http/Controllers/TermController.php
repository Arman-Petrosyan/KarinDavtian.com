<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;

class TermController extends Controller
{
    public function index()
    {
        $data = Term::first();
        return view('terms', compact('data'));
    }
}
