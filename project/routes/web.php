<?php

use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\NewslleterController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductController;

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
Route::post('/settings/change-password/edit', [SettingsController::class, 'changePasswordPost'])->name('settings.changePasswordPost');
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

Route::get('admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.editUser')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/users/{user}', [AdminController::class, 'update'])->name('admin.updateUser')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.deleteUser')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/users/restore/{id}', [AdminController::class, 'restoreUser'])->name('admin.restoreUser')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.addProduct')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin.storeProduct')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/product/{product}', [ProductController::class, 'destroy'])->name('admin.deleteProduct')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/product/restore/{id}', [ProductController::class, 'restoreProduct'])->name('admin.restoreProduct')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/product/{product}/edit', [ProductController::class, 'edit'])->name('admin.editProduct')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/product/{product}', [ProductController::class, 'update'])->name('admin.updateProduct')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/productColor/create/{product_color}', [ProductColorController::class, 'create'])->name('admin.addProductColor')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/productColor/store/{product_color}', [ProductColorController::class, 'store'])->name('admin.storeProductColor')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/productColor/{product_color}/edit', [ProductColorController::class, 'edit'])->name('admin.editProductColor')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/productColor/{product_color}', [ProductColorController::class, 'update'])->name('admin.updateProductColor')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/productColor/{product_color}', [ProductColorController::class, 'destroy'])->name('admin.deleteProductColor')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/photo/{photo}', [PhotoController::class, 'destroy'])->name('admin.deletePhoto')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/stock/create/{stock}', [StockController::class, 'create'])->name('admin.addStock')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/productColor/stock/create/{product_color}', [StockController::class, 'createProdColorStock'])->name('admin.addProdColorStock')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/stock/store/{stock}', [StockController::class, 'store'])->name('admin.storeStock')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/productColor/stock/store', [StockController::class, 'storeProdColorStock'])->name('admin.storeProdColorStock')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/stock/{stock}/edit', [StockController::class, 'edit'])->name('admin.editStock')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/stock/{stock}', [StockController::class, 'update'])->name('admin.updateStock')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/stock/{stock}', [StockController::class, 'destroy'])->name('admin.deleteStock')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/stock/restore/{id}', [StockController::class, 'restoreProduct'])->name('admin.restoreStock')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/categorie/create', [CategorieController::class, 'create'])->name('admin.addCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/categorie/store', [CategorieController::class, 'store'])->name('admin.storeCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/categorie/{categorie}/edit', [CategorieController::class, 'edit'])->name('admin.editCategorie')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/categorie/{categorie}', [CategorieController::class, 'update'])->name('admin.updateCategorie')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/categorie/{categorie}', [CategorieController::class, 'destroy'])->name('admin.deleteCategorie')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/categorie/restore/{id}', [CategorieController::class, 'restoreCategorie'])->name('admin.restoreCategorie')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.addBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/brand/store', [BrandController::class, 'store'])->name('admin.storeBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brand/{brand}/edit', [BrandController::class, 'edit'])->name('admin.editBrand')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/brand/{brand}', [BrandController::class, 'update'])->name('admin.updateBrand')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brand/{brand}', [BrandController::class, 'destroy'])->name('admin.deleteBrand')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brand/restore/{id}', [BrandController::class, 'restoreBrand'])->name('admin.restoreBrand')->middleware(['isAdmin', 'auth', 'verified']);

Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('deleteOrder')->middleware(['auth', 'verified']);
Route::get('admin/orders/restore/{id}', [OrderController::class, 'restoreOrder'])->name('admin.restoreOrder')->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/order/{order}/edit', [OrderController::class, 'edit'])->name('admin.editOrder')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/order/{order}', [OrderController::class, 'update'])->name('admin.updateOrder')->withTrashed()->middleware(['isAdmin', 'auth', 'verified']);
Route::get('admin/brand/restore/{id}', [BrandController::class, 'restoreBrand'])->name('admin.restoreBrand')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/color/create', [ColorController::class, 'create'])->name('admin.addColor')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/color/store', [ColorController::class, 'store'])->name('admin.storeColor')->middleware(['isAdmin', 'auth', 'verified']);

Route::get('admin/size/create', [SizeController::class, 'create'])->name('admin.addSize')->middleware(['isAdmin', 'auth', 'verified']);
Route::post('admin/size/store', [SizeController::class, 'store'])->name('admin.storeSize')->middleware(['isAdmin', 'auth', 'verified']);

Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout')->middleware(['auth', 'verified']);
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success')->middleware(['auth', 'verified']);

Route::get('admin/newslleter', [NewslleterController::class, 'create'])->name('admin.createNewslleter')->middleware(['auth', 'verified']);
Route::post('admin/newslleter', [EmailController::class, 'newslleter'])->name('admin.storeNewslleter')->middleware(['auth', 'verified']);

/* Route::post('/newslleter', [NewslleterController::class, 'store'])->name('newslleter'); */
Route::post('/newslleter', [EmailController::class, 'formNewslleter'])->name('newslleter');
/* Route::get('/validateNewslleter/{id}/{hash}', [NewslleterController::class, 'store'])->name('validateNewslleter'); */
Route::get('/validateNewslleter/{id}', [NewslleterController::class, 'store'])->name('validateNewslleter');

Route::get('/forgetPassword', [RouterController::class, 'forgetPass'])->name('form.forgetPass');
Route::post('/forgetPassword/reset', [EmailController::class, 'forgetPass'])->name('forgetPass');

Route::post('/support', [EmailController::class, 'support'])->name('support');

/* Testes */
/* Route::get('/testes', [StockController::class, 'index'])->name('testes'); */
/* Route::get('/testes', [EmailController::class, 'sendEmail'])->name('sendEmail'); */