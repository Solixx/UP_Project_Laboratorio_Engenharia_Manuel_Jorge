<?php

use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Route;

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
Route::get('/products', [RouterController::class, 'products'])->name('products');
Route::get('/product', [RouterController::class, 'product'])->name('product');
Route::get('/login', [RouterController::class, 'login'])->name('login');
Route::get('/register', [RouterController::class, 'register'])->name('register');
Route::get('/profile', [RouterController::class, 'profile'])->name('profile');
Route::get('/settings/edit-profile', [RouterController::class, 'editProfile'])->name('editProfile');
Route::get('/settings/account-management', [RouterController::class, 'accountManagement'])->name('accountManagement');
Route::get('/settings/change-password', [RouterController::class, 'changePassword'])->name('changePassword');