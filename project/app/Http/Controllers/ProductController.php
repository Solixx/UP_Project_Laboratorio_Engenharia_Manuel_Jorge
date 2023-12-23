<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product_Brand;
use App\Models\Product_Categorie;
use App\Models\Product_Color;
use App\Models\Photo;

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
        $categories = Categorie::all();
        $brands = Brand::all();
        $colors = Color::all(); 
    
        return view('includes.addProduct', compact('categories', 'brands', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categories' => 'required',
            'brands' => 'required',
            'colors' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        foreach($request->categories as $categories){
            $product_categorie = new Product_Categorie();
            $product_categorie->categorie_id = $categories;
            $product_categorie->product_id = $product->id;
            $product_categorie->save();
        }
        foreach($request->brands as $brands){
            $product_brand = new Product_Brand();
            $product_brand->brand_id = $brands;
            $product_brand->product_id = $product->id;
            $product_brand->save();
        }
        foreach($request->colors as $colors){
            $product_color = new Product_Color();
            $product_color->color_id = $colors;
            $product_color->product_id = $product->id;
            $product_color->save();
        }

        $product_color = Product_Color::where('product_id', $product->id)->first();

        return redirect()->route('admin.addProductColor',$product_color->id)->with('success', 'Product added successfully.');
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
