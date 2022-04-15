<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermRequest;
use Illuminate\Http\Request;
use App\Term;

class TermController extends Controller
{
    public function edit()
    {
        $term = Term::first();

        return view('admin.terms.action', compact('term'));
    }

    public function update(TermRequest $request, Term $term)
    {
        try {
            $term->update($request->getData());

            return redirect()->back()->withSuccess('info updated successfully');
        } catch (Exception $exception) {
            Log::error($exception);

            return response()->json(['error' => $exception->getCode(), 'message' => $exception->getMessage()]);
        }
        
    }
}
