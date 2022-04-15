<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class AboutController extends Controller
{
    public function index()
    {
        $info = Info::select(['image', 'about'])->first();
        return view('about', compact('info'));
    }
}
