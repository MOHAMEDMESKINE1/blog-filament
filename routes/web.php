<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Post;
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
Route::controller(HomeController::class)->group(function(){

        Route::get('/','index')->name('home');
        Route::get('/about','about')->name('about');
        Route::get('/blog','blog')->name('blog');
        Route::get('/posts/{slug}','posts')->name('posts');
        Route::get('/contact','contact')->name('contact');
});
Route::controller(ContactController::class)->group(function(){

    // Route::get('/','index')->name('home');
    Route::post('/contact','store')->name('store.contact');
   
});