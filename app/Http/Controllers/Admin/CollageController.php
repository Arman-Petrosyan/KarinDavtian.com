<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CollageRequest;
use App\Collage;
use App\Gallery;
use Illuminate\Support\Facades\Log;
use Functions;
use Exception;

class CollageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collages = Collage::latest()->get();

        return view('admin.collages.index', compact('collages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collages.action')->withTitle('Create new collage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollageRequest $request)
    {
        try {
            $collage = Collage::create($request->getData());

            foreach ($request->collage_image as $key => $collage_image) {
                $image = $collage_image;
                $extension = $image->getClientOriginalExtension();
                $name = time() . rand(1, 100) . '.' . $extension;
                if(!$request->is_main[$key]) {
                    Functions::cropAndResizeImage($image, $name, 1090, 585, '/products/collages');
                } else {
                    Functions::cropAndResizeImage($image, $name, 348, 314, '/products/collages');
                }

                $gallery = new Gallery();
                $gallery->collage_id = $collage->id;
                $gallery->is_main = $request->is_main[$key] ? 1 : 0;
                $gallery->name = $name;
                $gallery->save();
            }

            return redirect()->route('collages.index')->withSuccess('Product created successfully');
        } catch (Exception $exception) {
            Log::error($exception);

            return response()->json(['error' => $exception->getCode(), 'message' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collage $collage)
    {
        return view('admin.collages.action', compact('collage'))->withTitle('Edit collage #' . $collage->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollageRequest $request, Collage $collage)
    {
        try {
            $collage->update($request->getData());

            foreach ($request->collage_image as $key => $collage_image) {
                $image = $collage_image;
                $extension = $image->getClientOriginalExtension();
                $name = time() . rand(1, 100) . '.' . $extension;
                if(!$request->is_main[$key]) {
                    Functions::cropAndResizeImage($image, $name, 1090, 585, '/products/collages');
                } else {
                    Functions::cropAndResizeImage($image, $name, 348, 314, '/products/collages');
                }

                $gallery = new Gallery();
                $gallery->collage_id = $collage->id;
                $gallery->is_main = $request->is_main[$key] ? 1 : 0;
                $gallery->name = $name;
                $gallery->save();
            }

            return redirect()->route('collages.index')->withSuccess('Product updated successfully');
        } catch (Exception $exception) {
            Log::error($exception);

            return response()->json(['error' => $exception->getCode(), 'message' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Collage $collage)
    {
        if(!$request->ajax())
            abort(404);
        
        return $collage->delete() ? ['action' => 2, 'success' => 1, 'msg' => 'Product deleted successfully.'] : ['action' => 2, 'success' => 0, 'msg' => 'An error has occurred.'];
    }
}
