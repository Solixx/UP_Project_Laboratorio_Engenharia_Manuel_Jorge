<?php

use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;

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
/* Route::post('/login', [RouterController::class, 'login'])->name('login');
Route::post('/register', [RouterController::class, 'register'])->name('register'); */
Route::get('/profile', [SettingsController::class, 'index'])->name('profile');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/settings/edit-profile', [SettingsController::class, 'editProfile'])->name('settings.editProfile');
Route::post('/settings/edit-profile/{user}', [SettingsController::class, 'editProfilePost'])->name('settings.editProfilePost');
Route::get('/settings/account-management', [SettingsController::class, 'accountManagement'])->name('settings.accountManagement');
Route::get('/settings/change-password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');

/* Route::post('save', [SettingsController::class, 'editProfilePost'])->name('settings.editProfilePost'); */

Auth::routes(['verify' => true]);

Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');