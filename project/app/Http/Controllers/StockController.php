<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_Color;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $stocks =  Stock::orderBy('updated_at', 'desc')->get(); */
        $stocks =  Stock::orderBy('updated_at', 'desc')->orderBy('id', 'desc')->paginate(20);
        /* $stocks =  Stock::paginate(20);  */
        $categories = Categorie::all();
        return view('products', compact('stocks', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Stock $stock)
    {
        return view('includes.addStock', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProdColorStock(Product_Color $product_color)
    {
        $sizes = Size::all();

        return view('includes.addStock-ProdColor', compact('product_color', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Stock $stock)
    {
        $request->validate([
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $stock->price = $request->price;
        $stock->stock = $request->stock;
        $stock->save();

        $allProductColors = Product_Color::where('product_id', $stock->product_color->product_id)->get();
        $lengthProductColors  = count($allProductColors);

        foreach($allProductColors as $indexColor => $prodColor){
            $allStocks = Stock::where('product_color_id', $prodColor->id)->orderBy('id')->get();
            $length = count($allStocks);
            foreach($allStocks as $index => $thisStock){
                if($thisStock->id == $stock->id && $index < $length-1){
                    $stock = $allStocks[$index + 1];
                    /* return view('includes.addStock', compact('stock')); */
                    return redirect()->route('admin.addStock', $stock->id);
                }
            }

            if($prodColor->id == $stock->product_color->id && $indexColor < $lengthProductColors-1){
                $nextProdColor = $allProductColors[$indexColor+1];
                $stock = Stock::where('product_color_id', $nextProdColor->id)->first();
                /* return view('includes.addStock', compact('stock')); */
                return redirect()->route('admin.addStock', $stock->id);
            }
        }


        return redirect()->route('admin.listProducts')->with('success', 'Stock added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProdColorStock(Request $request)
    {
        $request->validate([
            'product_color_id' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $stock = new Stock();
        $stock->product_color_id = $request->product_color_id;
        $stock->price = $request->price;
        $stock->stock = $request->stock;
        $stock->size_id = $request->size;
        $stock->save();

        return redirect()->route('admin.editProductColor', $request->product_color_id)->with('success', 'Stock added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        $comments = Comment::where('product_id', $stock->product_color->product_id)->orderBy('updated_at', 'desc')->get();
        /* $stocks = Stock::where('product_color_id', $stock->product_color->id)->orderBy()->get(); */
        /* $sizes = array();
        foreach ($stocks as $thisStock){
            $sizes[] = $thisStock->size;
        }
        sort($sizes); */
        $stocks = Stock::select('stocks.id as stock_id', 'sizes.id as size_id', '*')
            ->join('sizes', 'stocks.size_id', '=', 'sizes.id')
            ->where('product_color_id', $stock->product_color->id)
            ->orderBy('sizes.size')
            ->get();

        $fav = '';
        if(Auth::user()){
            $fav = Favorite::where('user_id', Auth::user()->id)->where('stock_id', $stock->id)->get()->first();
        }

        return view('product', compact('stock', 'comments', 'stocks', 'fav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('includes.editStock', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'price' => 'numeric',
            'stock' => 'numeric',
        ]);

        $stock->price = $request->price;
        $stock->stock = $request->stock;

        $stock->save();

        return redirect()->back()
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });
    
        if($item->isNotEmpty()) {
            Cart::instance('shopping')->remove($item->first()->rowId);
        }
        $stock->delete();

        return back();
    }

    public function restoreProduct($id)
    {
        $data = Stock::withTrashed()->find($id);
        if(auth()->user()->isAdmin) {
            $data->restore();
            return redirect()->back()->with('success', 'User restored successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function serachName(Request $request)
    {
        $request->validate([
            'searchName' => 'required|string|max:255',
        ]);

        $searchTerm = strtolower($request->searchName);

        session(['searchName' => $searchTerm]);

        $stocks = Stock::whereIn(
            'product_color_id',
            Product_Color::whereHas('product', function ($query) use ($searchTerm) {
                $query->whereRaw('LOWER(name) like ?', ['%' . $searchTerm . '%']);
            })->pluck('id')
        )->paginate(20);

        $stocks->appends(['searchName' => $searchTerm]);

        $categories = Categorie::all();
        
        return view('products', compact('stocks', 'categories'));
    }
}
