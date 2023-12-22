<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function adminHome()
    {
        if(auth()->user()->isAdmin) {
            $products = Stock::orderBy('created_at', 'desc')->orderBy('id', 'desc')->take(4)->get();
            $users = User::orderBy('created_at', 'desc')->orderBy('id', 'desc')->take(5)->get();
            $orders = Order::orderBy('created_at', 'desc')->orderBy('id', 'desc')->take(5)->get();

            return view('adminHome', compact('products', 'users', 'orders'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function listUsers()
    {
        if(auth()->user()->isAdmin) {
            $users = User::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);
            $usersDisabled = User::orderBy('created_at', 'desc')->orderBy('id', 'desc')->onlyTrashed()->paginate(20);

            return view('listUsers', compact('users', 'usersDisabled'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function listProducts()
    {
        if(auth()->user()->isAdmin) {
            $products = Stock::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);
            $productsDisabled = Stock::orderBy('created_at', 'desc')->orderBy('id', 'desc')->onlyTrashed()->paginate(20);

            return view('listProducts', compact('products', 'productsDisabled'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function listCategories()
    {
        if(auth()->user()->isAdmin) {
            $categories = Categorie::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);
            $categoriesDisabled = Categorie::orderBy('created_at', 'desc')->orderBy('id', 'desc')->onlyTrashed()->paginate(20);

            return view('listCategories', compact('categories', 'categoriesDisabled'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function listBrands()
    {
        if(auth()->user()->isAdmin) {
            $brands = Brand::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);
            $brandsDisabled = Brand::orderBy('created_at', 'desc')->orderBy('id', 'desc')->onlyTrashed()->paginate(20);

            return view('listBrands', compact('brands', 'brandsDisabled'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function listOrders()
    {
        if(auth()->user()->isAdmin) {
            $orders = Order::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(20);
            $ordersDisabled = Order::orderBy('created_at', 'desc')->orderBy('id', 'desc')->onlyTrashed()->paginate(20);

            return view('listOrders', compact('orders', 'ordersDisabled'));
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function destroyUser(User $user)
    {
        if(auth()->user()->isAdmin) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }

    public function restoreUser($id)
    {
        $data = User::withTrashed()->find($id);
        if(auth()->user()->isAdmin) {
            $data->restore();
            return redirect()->back()->with('success', 'User restored successfully');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }
}
