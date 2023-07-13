<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('reports-daily/{date}', [CustomAuthController::class, 'reportsdaily'])->name('reports.daily');
Route::post('reports-date', [CustomAuthController::class, 'reportsdate'])->name('reports.date');
Route::get('reports-famous', [CustomAuthController::class, 'reportsfamous'])->name('reports.famous');
Route::get('create-order', [CustomAuthController::class, 'ordercreate'])->name('order.create');
Route::post('create-order-item', [CustomAuthController::class, 'orderItemscreate'])->name('order.item.create');
Route::post('remove-order-item', [CustomAuthController::class, 'orderItemsremove'])->name('order.item.remove');
Route::post('edit-order', [CustomAuthController::class, 'orderedit'])->name('order.edit');
Route::get('view-order/{id}', [CustomAuthController::class, 'orderview'])->name('order.view');
Route::get('/', function () {
    return view('welcome');
});

