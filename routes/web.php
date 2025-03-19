<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ProductController;

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

Route::get('/migrate', function(){
    Artisan::call('migrate');
});

Route::get('/clear/cache', function (){
    Cache::clear();
    return back();
})->name('clear.cache');

//products
Route::get('/products/category/{slug?}', [ProductController::class, 'category'])->name('products.category.details');
Route::get('/product/{slug?}', [ProductController::class, 'index'])->name('products.details');

//posts
Route::get('/category/{slug?}', [PostController::class, 'index'])->name('post.category');
Route::get('/post/{slug?}', [PostController::class, 'details'])->name('post.details');

Route::get('/{slug?}', PageController::class)->name('page');
Route::get('/', PageController::class)->name('home');
