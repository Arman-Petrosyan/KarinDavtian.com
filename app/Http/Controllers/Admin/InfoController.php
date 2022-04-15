<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use Illuminate\Http\Request;
use App\Info;
use Illuminate\Support\Facades\Log;
use Functions;
use Exception;
use File;

class InfoController extends Controller
{
    public function edit()
    {
        $info = Info::first();
        return view('admin.infos.action', compact('info'));
    }

    public function update(infoRequest $request, Info $info)
    {
        try {
            $info->update($request->getData());

            if(!empty($request->file('image'))) {
                File::delete(base_path().'/public/img/about/' . $info->image);
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $name = time() . rand(1, 100) . '.' . $extension;
                Functions::cropAndResizeImage($image, $name, 623, 563, '/about');
                $info->update(['image' => $name]);
            }

            return redirect()->route('jewelleries.index')->withSuccess('Information updated successfully');
        } catch (Exception $exception) {
            Log::error($exception);

            return response()->json(['error' => $exception->getCode(), 'message' => $exception->getMessage()]);
        }
    }
}
