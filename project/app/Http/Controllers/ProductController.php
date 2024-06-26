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
use App\Models\Stock;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
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
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:1|max:255',
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
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Categorie::all();
        $brands = Brand::all();
        $colors = Color::all(); 
        $product_color = Product_Color::where('product_id', $product->id)->get();

        $enable = true;
        if($product && $product->trashed()){
            $enable = false;
        }

        return view('includes.editProduct', compact('product', 'product_color', 'categories', 'brands', 'colors', 'enable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'min:1|max:255',
            'description' => 'min:1|max:255',
            'categories',
            'brands',
            'colors',
        ]);

        // Se alguma das categorias parar de estar selecionada ele procura e se não existir dá disable
        if($request->has('categories')){
            foreach(Product_Categorie::where('product_id', $product->id)->get() as $categories){
                if(!in_array($categories->categorie_id, $request->categories)){
                    $categories->delete();
                }
            }
        }

        // Vê as categorias selecioandas
        if($request->has('categories')){
            foreach($request->categories as $categories){
                // Se já existir mas tiver disable ele dá restore se não cria
                if(!Product_Categorie::where('product_id', $product->id)->where('categorie_id', $categories)->onlyTrashed()->get()->isEmpty()){
                    $product_categorie = Product_Categorie::where('product_id', $product->id)->where('categorie_id', $categories)->withTrashed()->first();
                    $product_categorie->restore();
                } else{
                    $product_categorie = new Product_Categorie();
                    $product_categorie->categorie_id = $categories;
                    $product_categorie->product_id = $product->id;
                    $product_categorie->save();
                }
            }
        }

        if($request->has('brands')){
            foreach(Product_Brand::where('product_id', $product->id)->get() as $brands){
                if(!in_array($brands->brand_id, $request->brands)){
                    $brands->delete();
                }
            }
        }
        
        if($request->has('brands')){
            foreach($request->brands as $brands){
                if(!Product_Brand::where('product_id', $product->id)->where('brand_id', $brands)->onlyTrashed()->get()->isEmpty()){
                    $product_brand = Product_Brand::where('product_id', $product->id)->where('brand_id', $brands)->withTrashed()->first();
                    $product_brand->restore();
                } else{
                    $product_brand = new Product_Brand();
                    $product_brand->brand_id = $brands;
                    $product_brand->product_id = $product->id;
                    $product_brand->save();
                }
            }
        }

        if($request->has('colors')){
            if($request->has('colors')){
                foreach($request->colors as $colors){
                    if(!Product_Color::where('product_id', $product->id)->where('color_id', $colors)->withTrashed()->get()->isEmpty()){
                        $product_color = Product_Color::where('product_id', $product->id)->where('color_id', $colors)->withTrashed()->first();
                        $product_color->restore();
                    } else{
                        $product_color = new Product_Color();
                        $product_color->color_id = $colors;
                        $product_color->product_id = $product->id;
                        $product_color->save();
                    }
                }
            }
        }

        $product->update($request->all());

        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product_colors = Product_Color::where('product_id', $product->id)->get();

        foreach($product_colors as $prodColor){
            $stocks = Stock::where('product_color_id', $prodColor->id)->get();
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
            $prodColor->delete();
        }

        $product->delete();

        return redirect()->back()
            ->with('success', 'Product deleted successfully.');
    }

    public function restoreProduct($id)
    {
        $data = Product::withTrashed()->find($id);
        $count_product_brands = count(Product_Brand::where('product_id', $data->id)->onlyTrashed()->get());
        $count_product_categories = count(Product_Categorie::where('product_id', $data->id)->onlyTrashed()->get());
        if($count_product_brands > 0){
            return back()->with('error', 'This product have one or more brands disabled');
        }
        if($count_product_categories > 0){
            return back()->with('error', 'This product have one or more categories disabled');
        }

        if(auth()->user()->isAdmin) {
            $data->restore();
            return redirect()->back()->with('success', 'Product restored successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }
}
