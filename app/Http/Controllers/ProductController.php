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
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
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
        ]);

        Product::create($data);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update');
        return view('product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update');
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'required|string|max:512',
            'price' => 'required|numeric|min:1',
        ]);
        $product->update($data);
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete');

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
            'product' => $product
        ]);
    }
}
