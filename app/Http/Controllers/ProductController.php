<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'required|string|max:512',
            'price' => 'required|numeric|min:1',
            'has_battery' => 'required|boolean',
            'battery_duration' => 'sometimes|required_if:has_battery,true|min:1',
            'colors' => 'required|array',
            'colors.*' => 'string',
            'dimensions' => 'required|array',
            'dimensions.width' => 'required|numeric|min:1',
            'dimensions.height' => 'required|numeric|min:1',
            'dimensions.lenght' => 'required|numeric|min:1',
            'accesories' => 'required|array',
            'accessories.*.name' => 'required|string',
            'accesories.*.price' => 'required|numeric|min:1'
        ]);

        Product::create($data);

        return response()->json([
            'message' => 'Producto creado con éxito'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
