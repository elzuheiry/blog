<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        // START ROUTES OF BASIC CONTROLLER
        Route::get('/', [Controller::class, 'index'])->name('index');

        Route::group(['prefix' => 'users'], function(){
            Route::get('/', [UserController::class, 'index'])->name('userProfile');
        });

        // START ROUTES OF POSTS CONTROLLER
        Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
        Route::post('posts/{post:slug}/comments', [PostController::class, 'storeComment'])->name('storeComment');
        
        // START ADMIN ROUTES
        Route::group(['prefix' => 'admin'], function () {

            // START ROUTES OF POSTS 
            Route::get('posts/create', [AdminPostController::class, 'create'])->name('publish-post');
            Route::post('posts', [AdminPostController::class, 'store'])->name('store-post');

            Route::get('posts', [AdminPostController::class, 'index'])->name('allPosts');
            Route::delete('posts/{post:slug}', [AdminPostController::class, 'destroy'])->name('destroy-post');

            Route::get('posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->name('edit-post');
            Route::patch('posts/{post:slug}', [AdminPostController::class, 'update'])->name('update-post');

            // START ROUTES OF CATEGORES
            Route::get('categories', [AdminCategoryController::class, 'index'])->name('allCategories');
            Route::delete('categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->name('destroy-category');
            
            Route::get('categories/create', [AdminCategoryController::class, 'create'])->name('publish-category');
            Route::post('categories', [AdminCategoryController::class, 'store'])->name('store-category');

            Route::get('categories/{category:slug}/edit', [AdminCategoryController::class, 'edit'])->name('edit-category');
            Route::patch('categories/{category:slug}', [AdminCategoryController::class, 'update'])->name('update-category');

        });

        // START ROUTES OF REGISTER CONTROLLER
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store'])->name('store');

        // START ROUTES OF SESSION CONTROLLER
        Route::get('login', [SessionController::class, 'create'])->name('login');
        Route::post('login', [SessionController::class, 'store'])->name('session');
        Route::post('logout', [SessionController::class, 'destroy'])->name('destroy');

    });