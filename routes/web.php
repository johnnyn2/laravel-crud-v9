<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
Route::get('/home', function() {
    return view('home');
});
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/{id}', [ProductsController::class, 'show']);
Route::get('/products/{name}', [ProductsController::class, 'show']);
Route::get('/string', function() {
    return 'this is a string';
});
Route::get('/array', function() {
    return ['this', 'is', 'array'];
});
Route::get('/json', function() {
    return response()->json([
        'name' => 'Laravel-crud-v9',
        'framework' => 'laravel'
    ]);
});
Route::get('/redirect', function() {
    return redirect('/redirectedPage');
});
Route::get('/redirectedPage', function() {
    return 'redirected';
});
