<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collage;

class CollageController extends Controller
{
    public function index(Request $request)
    {
        $collages = Collage::select(['id', 'title'])->with('images')->latest()->get();

        return view('collages.index', compact('collages'))->withTitle('Collages');
    }

    public function show(Request $request, Collage $collage)
    {
        $collage->load('images');
        $nextId = Collage::where('id', '>', $collage->id)->select('id')->first();
        $prevId = Collage::where('id', '<', $collage->id)->select('id')->latest()->first();
        
        return view('collages.view', compact('collage', 'nextId', 'prevId'))->withTitle('Collage | ' . $collage->title);
    }
}
