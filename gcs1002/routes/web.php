<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('Customers/index', [ProductController::class, 'index3']);

Route::get('product-list', [ProductController::class, 'index2']);
Route::get('product-add', [ProductController::class, 'add']);
Route::post('product-save', [ProductController::class, 'save']);
Route::get('product-edit/{id}', [ProductController::class, 'edit']);
Route::post('product-update', [ProductController::class, 'update']);
Route::get('product-delete/{id}', [ProductController::class, 'delete']);
