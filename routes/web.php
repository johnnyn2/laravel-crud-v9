<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PostController;

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
// route to controller method with route name
Route::get('/products', [ProductsController::class, 'index'])->name('products');
// route to controller method with path variables and pattern
Route::get('/products/{name}/{id}', [ProductsController::class, 'show'])->where([
    'name' => '[a-zA-Z0-9-]+',
    'id' => '[0-9]+'
]);
// create CRUD routes mapped to PostController
Route::resource('/posts', PostController::class);
Route::get('/about', function() {
    return view('pages.about');
});
Route::get('/introduction', function() {
    return view('pages.introduction');
});
// route to return a string
Route::get('/string', function() {
    return 'this is a string';
})->name('string');
// route to return an array
Route::get('/array', function() {
    return ['this', 'is', 'array'];
});
// route to return a json object
Route::get('/json', function() {
    return response()->json([
        'name' => 'Laravel-crud-v9',
        'framework' => 'laravel'
    ]);
});
// route to redirect route
Route::get('/redirect', function() {
    return redirect('/redirectedPage');
});
Route::get('/redirectedPage', function() {
    return 'redirected';
});

