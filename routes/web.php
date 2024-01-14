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
    return redirect('/login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/transaction/invoice', [TransactionController::class, 'invoice'])->name('invoice');

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin-staff'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Route::get('/add', [AdminController::class, 'create'])->name('add');
    Route::get('/transaction', [AdminController::class, 'transaction'])->name('transaction');
    Route::get('/transaction/{transaction}', [AdminController::class, 'transactionDetail'])->name('transaction.detail');
});

Route::prefix('/membership')->name('member.')->middleware(['auth', 'role:member'])->group(function () {
    Route::get('/dashboard', [MembershipController::class, 'index'])->name('dashboard');
    // Route::get('/car', [MembershipController::class, 'index'])->name('dashboard');
    Route::get('/car/{car}', [MembershipController::class, 'carDetail'])->name('car.detail');
    Route::get('/pricing', [MembershipController::class, 'pricing'])->name('price-list');
    Route::get('/register/{id}', [MembershipController::class, 'register'])->name('register');
    Route::post('/store', [MembershipController::class, 'store'])->name('store-regis');
});

Auth::routes();
