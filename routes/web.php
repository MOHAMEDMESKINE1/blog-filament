<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
        Route::get('/posts/tag/{tagName}','postsByTag')->name('posts_tag');

        Route::get('/contact','contact')->name('contact');
});
Route::controller(ContactController::class)->group(function(){

    // Route::get('/','index')->name('home');
    Route::post('/contact','store')->name('store.contact');
   
});
Route::controller(CommentController::class)->group(function(){

    Route::post('/comments/{id}','store')->name('comments.store');
    Route::post('/comments/reply/{id}/{parent_id}','reply')->name('comments.reply');
   
});
Route::controller(PostController::class)->group(function(){

    Route::get('/posts','index')->name('posts.index');
   
});