<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Brand;
use App\Models\Product_Color;
use App\Models\Stock;
use App\Models\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $brands = Brand::all();
        return view('index', compact('brands')); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('includes.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|max:200',
        ]);

        $brand = new Brand();

        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $brand->img = $imgName;
            $brand->imgPath = 'storage/images/'.$request->file('image')->hashName();
        }

        $brand->name = $request->name;
        $brand->save();

        return redirect()->back()
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('includes.editBrand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'min:1|max:200',
        ]);

        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $brand->img = $imgName;
            $brand->imgPath = 'storage/images/'.$request->file('image')->hashName();
        }

        $brand->update($request->all());

        return redirect()->back()
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        foreach(Product_Brand::where('brand_id', $brand->id)->get() as $product_brand){
            foreach(Product::where('id', $product_brand->product_id)->get() as $product){
                foreach(Product_Color::where('product_id', $product->id)->get() as $productColor){
                    foreach(Stock::where('product_color_id', $productColor->id)->get() as $stock){
                        $stock->delete();
                    }
                    $productColor->delete();
                }
                $product->delete();
            }
            $product_brand->delete();
        }

        $brand->delete();

        return redirect()->back()
            ->with('success', 'Brand deleted successfully.');

        /* $brands = Brand::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);

        return view('listBrands', compact('brands'))
            ->with('success', 'Brand deleted successfully.'); */
    }

    public function restoreBrand($id)
    {
        $data = Brand::withTrashed()->find($id);
        if(auth()->user()->isAdmin) {
            $data->restore();
            $product_brands = Product_Brand::where('brand_id', $data->id)->withTrashed()->get();
            foreach($product_brands as $product_brand){
                $product_brand->restore();
            }

            return redirect()->back()->with('success', 'Brand restored successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }
}
