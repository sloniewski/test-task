<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = new Product();
            $product->fill($request->only(Product::classFillable()));
            $product->save();

            return $product;
        } catch (\Throwable $exception) {
            Log::error(
                'File ' . __CLASS__
                . ' line: ' . __LINE__
                . ' message: ' . $exception->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->fill($request->only(Product::getFillable()));
            $product->save();

            return $product;
        } catch (\Throwable $exception) {
            Log::error(
                'File ' . __CLASS__
                . ' line: ' . __LINE__
                . ' message: ' . $exception->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Throwable $exception) {
            Log::error(
                'File ' . __CLASS__
                . ' line: ' . __LINE__
                . ' message: ' . $exception->getMessage()
            );
        }
    }
}
