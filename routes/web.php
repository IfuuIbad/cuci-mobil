<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transaction/invoice', [App\Http\Controllers\TransactionController::class, 'invoice'])->name('invoice');

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/add', [AdminController::class, 'create'])->name('admin.add');
    Route::get('/inbox', [AdminController::class, 'inbox'])->name('admin.inbox');
    Route::get('/pricing', [AdminController::class, 'pricing'])->name('admin.pricing');
});

Auth::routes();
