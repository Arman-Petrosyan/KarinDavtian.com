<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function delete(Request $request, Gallery $gallery)
    {
        if(!$request->ajax())
            abort(404);

        try {
            $gallery->delete();
            return ['action' => 1, 'success' => 1, 'msg' => 'Data deleted successfully'];
        } catch (Exception $exception) {
            Log::error($exception);
            return ['action' => 1, 'success' => 0, 'msg' => 'The data cannot be deleted.'];
        }

        
    }
}
