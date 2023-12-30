<?php

namespace App\Http\Controllers;

use App\Models\Product_Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use App\Models\Photo;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product_Color $product_color)
    {
        $product = Product::where('id', $product_color->product->id)->get();
        $sizes = Size::all();

        return view('includes.addProductColor', compact('product_color', 'product', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product_Color $product_color)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'size' => 'required',
        ]);

        $foto = new Photo();
        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $foto->img = $imgName;
            $foto->imgPath = 'storage/images/'.$request->file('image')->hashName();
            $foto->product_color_id = $product_color->id;
            $foto->save();
        }

        foreach($request->size as $size){
            $stock = new Stock();
            $stock->product_color_id = $product_color->id;
            $stock->size_id = $size;
            $stock->stock = 0;
            $stock->price = 0;
            $stock->save();
        }
        
        $firstProdColor = Product_Color::where('product_id', $product_color->product->id)->first();
        $allProductColors = Product_Color::where('product_id', $product_color->product->id)->get();
        $length = count($allProductColors);

        $product = Product::where('id', $product_color->product->id)->get();
        $sizes = Size::all();

        foreach($allProductColors as $index => $prodColor){
            if($prodColor->id == $product_color->id && $index < $length-1){
                $product_color = $allProductColors[$index + 1];
                /* return view('includes.addProductColor', compact('product_color',  'product', 'sizes')); */
                return redirect()->route('admin.addProductColor', $product_color->id);
            }
        }
        
        $stock = Stock::where('product_color_id', $firstProdColor->id)->first();

        return redirect()->route('admin.addStock', $stock)->with('success', 'Product Color added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_Color $product_Color)
    {
        //
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product_Color $product_color)
    {
        $stocks = Stock::where('product_color_id', $product_color->id)->paginate(5);
        $stocksDisabled  = Stock::where('product_color_id', $product_color->id)->onlyTrashed()->paginate(5);

        return view('includes.editProductColor', compact('product_color', 'stocks', 'stocksDisabled'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product_Color $product_color)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $foto = new Photo();
        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $foto->img = $imgName;
            $foto->imgPath = 'storage/images/'.$request->file('image')->hashName();
            $foto->product_color_id = $product_color->id;
            $foto->save();
        }

        return redirect()->back()
            ->with('success', 'Product Color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_Color $product_color)
    {
        $product = $product_color->product;

        $stocks = Stock::where('product_color_id', $product_color->id)->get();
        foreach($stocks as $stock){
            $stockId = $stock->id;
            $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
                return $cartItem->id === $stockId;
            });
    
            if($item->isNotEmpty()) {
                Cart::instance('shopping')->remove($item->first()->rowId);
            }
            $stock->delete();
        }

        $product_color->delete();

        return redirect()->route('admin.editProduct', $product->id)
            ->with('success', 'Product Color deleted successfully.');
    }
}
