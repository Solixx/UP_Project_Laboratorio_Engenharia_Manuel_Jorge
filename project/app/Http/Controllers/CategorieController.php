<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use App\Models\Product_Categorie;
use Illuminate\Http\Request;
use App\Models\Product_Color;
use App\Models\Stock;

class CategorieController extends Controller
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
        return view('includes.addCategorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        Categorie::create($request->all());

        return redirect()->back()
            ->with('success', 'Categorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('includes.editCategorie', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $categorie->update($request->all());

        return redirect()->back()
            ->with('success', 'Categorie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        foreach(Product_Categorie::where('categorie_id', $categorie->id)->get() as $product){
            foreach(Product_Color::where('product_id', $product->product_id)->get() as $productColor){
                foreach(Stock::where('product_color_id', $productColor->id)->get() as $stock){
                    $stock->delete();
                }
            }
        }

        $categorie->delete();

        return back();
    }

    public function restoreCategorie($id)
    {
        $data = Categorie::withTrashed()->find($id);
        if(auth()->user()->isAdmin) {
            $data->restore();
            return redirect()->back()->with('success', 'User restored successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }
}
