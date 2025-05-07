<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::prefix('admin')->group(function() {
    Route::middleware('admin')->group(function() {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::resource('categories', CategoryController::class, [
            'names' => [
                'index' => 'admin.categories.index',
                'create' => 'admin.categories.create',
                'store' => 'admin.categories.store',
                'edit' => 'admin.categories.edit',
                'update' => 'admin.categories.update',
                'destroy' => 'admin.categories.destroy'
            ]
        ]);
        //reviews routes
        Route::get('reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
        Route::get('edit/{review}/{status}/reviews', [ReviewController::class, 'toggleReviewStatus'])->name('admin.reviews.edit');
        Route::delete('delete/{review}/reviews', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
        //pictures routes
        Route::get('pictures', [PictureController::class, 'index'])->name('admin.pictures.index');
        Route::get('edit/{picture}/{status}/pictures', [PictureController::class, 'togglePictureStatus'])->name('admin.pictures.edit');
        //users routes
        Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
        Route::delete('delete/{user}/users', [UserController::class, 'destroy'])->name('admin.users.destroy');
        //orders routes
        Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::delete('delete/{order}/orders', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
});
