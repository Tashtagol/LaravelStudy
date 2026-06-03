<?php

use Illuminate\Support\Facades\Route;

Route::get('/my-page', [\App\Http\Controllers\MyPlaceController::class,'index']);
Route::get ('/my-pussy',[\App\Http\Controllers\PussyController::class,'getPussy']);
Route::get ('/my-drochka',[\App\Http\Controllers\DrochkaContoller::class,'getDrochka']);






Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/post', 'IndexController')->name('post.index');
    Route::get('/post/create', 'CreateController')->name('post.create');
    Route::post('/post', 'StoreController')->name('post.store');
    Route::get('/post/{post}', 'ShowController')->name('post.show');
    Route::get('/post/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/post/{post}', 'UpdateController')->name('post.update');
    Route::delete('/post/{post}', 'DestroyController')->name('post.delete');
});








Route::get ('/posts/first_or_create',[\App\Http\Controllers\PostController::class,'firstOrCreate']);
Route::get ('/posts/update_or_create',[\App\Http\Controllers\PostController::class,'updateOrCreate']);


Route::get ('/main',[\App\Http\Controllers\MainController::class,'index'])->name('main.index');
Route::get ('/contacts',[\App\Http\Controllers\ContactController::class,'index'])->name('contact.index');
Route::get ('/about',[\App\Http\Controllers\AboutController::class,'index'])->name('about.index');

