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
Route::get('/login', [RouterController::class, 'login'])->name('login');
Route::get('/register', [RouterController::class, 'register'])->name('register');