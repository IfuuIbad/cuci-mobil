<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TransactionController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/transaction/invoice', [TransactionController::class, 'invoice'])->name('invoice');

Route::prefix('/admin')->name('admin')->middleware(['auth', 'role:admin-staff'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/add', [AdminController::class, 'create'])->name('.add');
    Route::get('/inbox', [AdminController::class, 'inbox'])->name('.inbox');
});

Route::prefix('/membership')->name('member.')->middleware(['auth', 'role:member'])->group(function () {
    Route::get('/dashboard', [MembershipController::class, 'index'])->name('dashboard');
    Route::get('/pricing', [MembershipController::class, 'pricing'])->name('price-list');
    Route::get('/register/{id}', [MembershipController::class, 'register'])->name('register');
    Route::post('/store', [MembershipController::class, 'store'])->name('store-regis');
});

Auth::routes();
