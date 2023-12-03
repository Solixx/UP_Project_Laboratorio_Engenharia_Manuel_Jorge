<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Product_Color;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $stocks =  Stock::orderBy('updated_at', 'desc')->get(); */
        $stocks =  Stock::orderBy('updated_at', 'desc')->paginate(20);
        $categories = Categorie::all();
        return view('products', compact('stocks', 'categories'));
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
    public function show(Stock $stock)
    {
        return view('product', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }


    public function serachName(Request $request)
    {
        $request->validate([
            'searchName' => 'required|string|max:255',
        ]);

        $stocks = Stock::whereIn(
            'product_color_id',
            Product_Color::whereHas('product', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->searchName . '%');
            })->pluck('id')
        )->paginate(20);
        $categories = Categorie::all();
        
        return view('products', compact('stocks', 'categories'));
    }
}
