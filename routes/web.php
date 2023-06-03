<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\GenreController::class)->group(function () {
        Route::get('/genres', 'index');
        Route::get('/genre/create', 'create');
        Route::post('/genre', 'store');
        Route::get('/genre/{genre}/edit', 'edit');
        Route::put('/genre/{genre}', 'update');
    });
    
    Route::controller(App\Http\Controllers\Admin\TypeController::class)->group(function () {
        Route::get('/types', 'index');
        Route::get('/type/create', 'create');
        Route::post('/type', 'store');
        Route::get('/type/{type}/edit', 'edit');
        Route::put('/type/{type}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\PostController::class)->group(function () {
        Route::get('/posts', 'index');
        Route::get('/post/create', 'create');
        Route::post('/post', 'store');
        Route::get('/post/{post}/edit', 'edit');
        Route::put('/post/{post}', 'update');
        Route::get('/post/{post}/delete', 'destroy');

        Route::get('post-image/{post_image_id}/delete', 'destroyImage');
    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/user/{user}/edit', 'edit');
        Route::put('/user/{user}', 'update');
        Route::get('/user/{user}/delete', 'destroy');
    });
});
