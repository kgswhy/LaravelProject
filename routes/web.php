<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\LoginController;
use App\Models\Aspirasi;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route untuk guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/dashboard', [AspirasiController::class, 'index']);
    Route::get('/dashboard/aspirasis/{aspirasi}', [AspirasiController::class, 'edit']);
    Route::post('/dashboard/aspirasis/{aspirasi}', [AspirasiController::class, 'update']);
    Route::resource('/dashboard/categories', CategoryController::class)->except('show');
});

Route::get('/CreateAspirasi', [AspirasiController::class, 'create']);
Route::post('/CreateAspirasi', [AspirasiController::class, 'store']);

Route::get('/', [LandingPage::class, 'index']);

Route::get('/aspirasis', [AspirasiController::class, 'indexUser']);
Route::get('/aspirasis/{aspirasi}', [AspirasiController::class, 'show']);
