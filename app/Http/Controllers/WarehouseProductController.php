<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouseProductRequest;
use App\Http\Requests\UpdateWarehouseProductRequest;
use App\Models\WarehouseProduct;
use Illuminate\Support\Facades\Log;

class WarehouseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WarehouseProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseProductRequest $request)
    {
        try {
            $warehouseProduct = new WarehouseProduct();
            $warehouseProduct->fill($request->only(WarehouseProduct::classFillable()));
            $warehouseProduct->save();

            return $warehouseProduct;
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
    public function show(WarehouseProduct $warehouseProduct)
    {
        return $warehouseProduct;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseProductRequest $request, WarehouseProduct $warehouseProduct)
    {
        try {
            $warehouseProduct->fill($request->only(WarehouseProduct::classFillable()));
            $warehouseProduct->save();

            return $warehouseProduct;
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
    public function destroy(WarehouseProduct $warehouseProduct)
    {
        try {
            $warehouseProduct->delete();
        } catch (\Throwable $exception) {
            Log::error(
                'File ' . __CLASS__
                . ' line: ' . __LINE__
                . ' message: ' . $exception->getMessage()
            );
        }
    }
}
