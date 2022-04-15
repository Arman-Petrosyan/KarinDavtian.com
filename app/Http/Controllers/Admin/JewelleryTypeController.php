<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JewelleryType;

class JewelleryTypeController extends Controller
{
    public function index()
    {
        $types = JewelleryType::all();

        return view('admin.jewellery_types.index', compact('types'));
    }

    public function changeStatus(Request $request, JewelleryType $jewellery_type)
    {
        return !$request->ajax() ? abort(404) : $jewellery_type->update(['status' => $request->status]);
    }
}
