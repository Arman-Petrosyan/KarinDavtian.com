<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $info = Info::select(['instagram_link', 'pinterest_link', 'v_link'])->first();
        return view('home', compact('info'));
    }
}
