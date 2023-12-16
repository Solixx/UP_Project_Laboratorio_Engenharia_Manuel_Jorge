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
Route::get('/products&search', [StockController::class, 'serachName'])->name('search.products');
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

Route::get('admin/', [AdminController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');
Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');
Route::get('admin/users', [AdminController::class, 'listUsers'])->name('admin.listUsers')->middleware('isAdmin');
Route::get('admin/products', [AdminController::class, 'listProducts'])->name('admin.listProducts')->middleware('isAdmin');
Route::get('admin/categories', [AdminController::class, 'listCategories'])->name('admin.listCategories')->middleware('isAdmin');
Route::get('admin/brands', [AdminController::class, 'listBrands'])->name('admin.listBrands')->middleware('isAdmin');
Route::get('admin/orders', [AdminController::class, 'listOrders'])->name('admin.listOrders')->middleware('isAdmin');

Route::get('admin/product/create', [StockController::class, 'create'])->name('admin.addProduct')->middleware('isAdmin')
                                                                                            ->middleware('auth')
                                                                                            ->middleware('verified');

Route::get('admin/categorie/create', [CategorieController::class, 'create'])->name('admin.addCategorie')->middleware('isAdmin')
                                                                                            ->middleware('auth')
                                                                                            ->middleware('verified');
Route::post('admin/categorie/store', [CategorieController::class, 'store'])->name('admin.storeCategorie');

Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.addBrand')->middleware('isAdmin')
                                                                                            ->middleware('auth')
                                                                                            ->middleware('verified');
Route::post('admin/brand/store', [BrandController::class, 'store'])->name('admin.storeBrand');

/* Testes */
/* Route::get('/testes', [ProductBrandController::class, 'index'])->name('testes'); */
/* Route::get('/testes', [StockController::class, 'index'])->name('testes'); */