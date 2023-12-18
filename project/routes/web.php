<?php

use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouterController::class, 'index'])->name('index');
Route::get('/products', [StockController::class, 'index'])->name('products');
Route::get('/products/search', [StockController::class, 'serachName'])->name('search.products');
/* Route::get('/product', [RouterController::class, 'product'])->name('product'); */
Route::get('/product/{stock}', [StockController::class, 'show'])->name('product');
/* Route::post('/login', [RouterController::class, 'login'])->name('login');
Route::post('/register', [RouterController::class, 'register'])->name('register'); */
Route::get('/profile', [SettingsController::class, 'index'])->name('profile');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/settings/edit-profile', [SettingsController::class, 'editProfile'])->name('settings.editProfile');
Route::post('/settings/edit-profile/{user}', [SettingsController::class, 'editProfilePost'])->name('settings.editProfilePost');
Route::get('/settings/account-management', [SettingsController::class, 'accountManagement'])->name('settings.accountManagement');
Route::post('/settings/account-management/{user}', [SettingsController::class, 'accountManagementPost'])->name('settings.accountManagementPost');
Route::get('/settings/change-password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
Route::get('/settings/change-password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
Route::delete('/settings/disable', [SettingsController::class, 'disableAccount'])->name('settings.disableAccount');

Route::post('/favorite/{stock}', [FavoriteController::class, 'store'])->name('favorite.store');
Route::delete('/favorite/{favorite}', [FavoriteController::class, 'destroy'])->name('favorite.delete');
Route::post('/comment/{product}', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
Route::post('/cart/{stock}', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/decrease/{stock}', [CartController::class, 'decreaseQty'])->name('cart.decrease');
Route::post('/cart/increase/{stock}', [CartController::class, 'increaseQty'])->name('cart.increase');
Route::post('/cart/setQty/{stock}', [CartController::class, 'setQty'])->name('cart.setQty');
Route::post('/cart/remove/{stock}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('invoice/{order}', [InvoiceController::class, 'generateInvoice'])->name('invoice');

/* Route::post('save', [SettingsController::class, 'editProfilePost'])->name('settings.editProfilePost'); */

Auth::routes(['verify' => true]);

Route::get('admin/', [AdminController::class, 'adminHome'])->name('admin.home')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/users', [AdminController::class, 'listUsers'])->name('admin.listUsers')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/products', [AdminController::class, 'listProducts'])->name('admin.listProducts')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/categories', [AdminController::class, 'listCategories'])->name('admin.listCategories')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brands', [AdminController::class, 'listBrands'])->name('admin.listBrands')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/orders', [AdminController::class, 'listOrders'])->name('admin.listOrders')->middleware(['isAdmin', 'auth', 'verified']);

Route::delete('admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.deleteUser')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/product/create', [StockController::class, 'create'])->name('admin.addProduct')->middleware(['isAdmin', 'auth', 'verified']);
Route::delete('admin/product/{stock}', [StockController::class, 'destroy'])->name('admin.deleteProduct')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/categorie/create', [CategorieController::class, 'create'])->name('admin.addCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/categorie/store', [CategorieController::class, 'store'])->name('admin.storeCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/categorie/{categorie}/edit', [CategorieController::class, 'edit'])->name('admin.editCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/categorie/{categorie}', [CategorieController::class, 'update'])->name('admin.updateCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::delete('admin/categorie/{categorie}', [CategorieController::class, 'destroy'])->name('admin.deleteCategorie')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.addBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/brand/store', [BrandController::class, 'store'])->name('admin.storeBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brand/{brand}/edit', [BrandController::class, 'edit'])->name('admin.editBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/brand/{brand}', [BrandController::class, 'update'])->name('admin.updateBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::delete('admin/brand/{brand}', [BrandController::class, 'destroy'])->name('admin.deleteBrand')->middleware(['isAdmin', 'auth', 'verified']);

Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('deleteOrder')->middleware(['auth', 'verified']);
Route::get('admin/order/{order}/edit', [OrderController::class, 'edit'])->name('admin.editOrder')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/order/{order}', [OrderController::class, 'update'])->name('admin.updateOrder')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/color/create', [ColorController::class, 'create'])->name('admin.addColor')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/color/store', [ColorController::class, 'store'])->name('admin.storeColor')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/size/create', [SizeController::class, 'create'])->name('admin.addSize')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/size/store', [SizeController::class, 'store'])->name('admin.storeSize')->middleware(['isAdmin', 'auth', 'verified']);

/* Testes */
/* Route::get('/testes', [ProductBrandController::class, 'index'])->name('testes'); */
/* Route::get('/testes', [StockController::class, 'index'])->name('testes'); */