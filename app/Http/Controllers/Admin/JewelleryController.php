<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JewelleryRequest;
use App\JewelleryType;
use App\Jewellery;
use App\Gallery;
use Illuminate\Support\Facades\Log;
use Functions;
use Exception;

class JewelleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Jewelleries = Jewellery::with('type')->latest()->get();

        return view('admin.jewelleries.index', compact('Jewelleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = JewelleryType::select(['id', 'name'])->orderBy('name')->get();

        return view('admin.jewelleries.action', compact('types'))->withTitle('Create new jewellery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JewelleryRequest $request)
    {
        try {
            $jewellery = Jewellery::create($request->getData());

            foreach ($request->jewellery_image as $key => $jewellery_image) {
                $image = $jewellery_image;
                $extension = $image->getClientOriginalExtension();
                $name = time() . rand(1, 100) . '.' . $extension;
                Functions::cropAndResizeImage($image, $name, 623, 563, '/products/jewelleries');

                $gallery = new Gallery();
                $gallery->jewellery_id = $jewellery->id;
                $gallery->is_main = $request->is_main[$key] ? 1 : 0;
                $gallery->name = $name;
                $gallery->save();
            }

            return redirect()->route('jewelleries.index')->withSuccess('Product created successfully');
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
    public function edit(Jewellery $jewellery)
    {
        $types = JewelleryType::select(['id', 'name'])->orderBy('name')->get();
        $jewellery->load('images');
        return view('admin.jewelleries.action', compact('jewellery', 'types'))->withTitle('Edit jewellery #' . $jewellery->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JewelleryRequest $request, Jewellery $jewellery)
    {
        try {
            $jewellery->update($request->getData());

            foreach ($request->jewellery_image as $key => $jewellery_image) {
                $image = $jewellery_image;
                $extension = $image->getClientOriginalExtension();
                $name = time() . rand(1, 100) . '.' . $extension;
                Functions::cropAndResizeImage($image, $name, 623, 563, '/products/jewelleries');

                if($request->is_main[$key]) {
                    $galleryItem = Gallery::where('jewellery_id', $jewellery->id)->where('is_main', 1)->first();
                    if($galleryItem)
                        $galleryItem->update(['is_main' => 0]);
                }

                $gallery = new Gallery();
                $gallery->jewellery_id = $jewellery->id;
                $gallery->is_main = $request->is_main[$key] ? 1 : 0;
                $gallery->name = $name;
                $gallery->save();
            }

            return redirect()->route('jewelleries.index')->withSuccess('Product updated successfully');
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
    public function destroy(Request $request, Jewellery $jewellery)
    {
        if(!$request->ajax())
            abort(404);
            
        return $jewellery->delete() ? ['action' => 2, 'success' => 1, 'msg' => 'Product deleted successfully.'] : ['action' => 2, 'success' => 0, 'msg' => 'An error has occurred.'];
    }
}
