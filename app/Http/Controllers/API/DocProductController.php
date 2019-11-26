<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\DocumentationProduct;
use App\Http\Resources\DocumentationProductResources as ProductResource;

class DocProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DocumentationProduct::where('code', '=', auth()->user()->code)->get();
        return response()->json(successResponse('Products retrieved successfully.' . auth()->user()->code, ProductResource::collection($products)), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(errorResponse('Request error'), 200);
        }
        $request['code'] = auth()->user()->code;
        $product = DocumentationProduct::create($request->all());
        return response()->json(successResponse('Successfully made new products.', new ProductResource($product)), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DocumentationProduct::where([['id', '=', $id], ['code', '=', auth()->user()->code]])->first();
        if (is_null($product)) {
            return response()->json(errorResponse('Product not found.'), 200);
        }
        return response()->json(successResponse('Product retrieved successfully.' . auth()->user()->code, new ProductResource($product)), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(errorResponse('Request error'), 200);
        }
        $updateProduct = DocumentationProduct::where([['id', '=', $id], ['code', '=', auth()->user()->code]])->update($request->all());
        if ($updateProduct) {
            return response()->json(successResponse('Successfully updated product.', new ProductResource($updateProduct)), 200);
        }
        return response()->json(errorResponse('Failed to update product'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = DocumentationProduct::where([['id', '=', $id], ['code', '=', auth()->user()->code]])->delete();
        if ($deleteProduct) {
            return response()->json(successResponse('Successfully deleted product.'), 200);
        }
        return response()->json(errorResponse('Failed to delete product'), 200);
    }
}
