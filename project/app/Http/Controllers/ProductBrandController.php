<?php

namespace App\Http\Controllers;

use App\Models\Product_Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_Brands = Product_Brand::all();
        return view('welcome', compact('product_Brands'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_Brand $product_Brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product_Brand $product_Brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product_Brand $product_Brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_Brand $product_Brand)
    {
        //
    }
}
