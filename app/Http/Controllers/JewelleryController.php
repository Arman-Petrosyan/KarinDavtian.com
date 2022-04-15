<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JewelleryType;
use App\Jewellery;

class JewelleryController extends Controller
{
    public function index(Request $request)
    {
        $selectedType = $request->type_id ?: null;
        $types = !$selectedType || $selectedType == 'all' ? [1, 2, 3, 4, 5, 6] : [$selectedType];
        $typesForFilter = JewelleryType::where('status', 1)->get();
        $jewelleries = Jewellery::whereIn('type_id', $types)->select(['id', 'title'])->with('type', 'images')->orderBy('id')->get();

        return view('jewelleries.index', compact('jewelleries', 'selectedType', 'typesForFilter'))->withTitle('Jewelleries');
    }

    public function show(Request $request, Jewellery $jewellery)
    {
        $jewellery->load('type', 'images');
        $nextId = Jewellery::where('id', '>', $jewellery->id)->select('id')->first();
        $prevId = Jewellery::where('id', '<', $jewellery->id)->select('id')->latest()->first();
        
        return view('jewelleries.view', compact('jewellery', 'nextId', 'prevId'))->withTitle('Jewelleries | ' . $jewellery->title);
    }
}
