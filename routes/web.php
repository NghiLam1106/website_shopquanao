<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('/main', [MainController::class, 'index']);

    
        #menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #product
        Route::prefix('product')->group(function(){
            Route::get('addproduct', [ProductController::class, 'create']);
            Route::post('addproduct', [ProductController::class, 'store']);
            Route::get('listproduct', [ProductController::class, 'index']);
            Route::get('editsp/{menu}', [ProductController::class, 'show']);
            Route::post('editsp/{menu}', [ProductController::class, 'update']);
            Route::DELETE('destroysp', [ProductController::class, 'destroy']);
        });

        #upload
        Route::post('upload/services', [UploadController::class, 'store']);

    });
});
