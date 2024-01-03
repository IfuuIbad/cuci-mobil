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



Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin-staff'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
});

Route::name('member.')->middleware(['auth', 'role:member'])->group(function () {
    Route::get('/membership/dashboard', [App\Http\Controllers\MembershipController::class, 'index'])->name('dashboard');
    Route::get('/membership-list', [AdminController::class, 'pricing'])->name('pricelist');
});

Auth::routes();
