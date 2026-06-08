<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER POSTS
|--------------------------------------------------------------------------
*/

Route::prefix('post')->group(function () {

    Route::get('/', App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/create', App\Http\Controllers\Post\CreateController::class)->name('post.create');
    Route::post('/', App\Http\Controllers\Post\StoreController::class)->name('post.store');

    Route::get('/{post}', App\Http\Controllers\Post\ShowController::class)->name('post.show');
    Route::get('/{post}/edit', App\Http\Controllers\Post\EditController::class)->name('post.edit');
    Route::patch('/{post}', App\Http\Controllers\Post\UpdateController::class)->name('post.update');
    Route::delete('/{post}', App\Http\Controllers\Post\DestroyController::class)->name('post.delete');

});

/*
|--------------------------------------------------------------------------
| EXTRA POST ACTIONS
|--------------------------------------------------------------------------
*/

Route::get('/posts/first_or_create', [App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [App\Http\Controllers\PostController::class, 'updateOrCreate']);

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'role'])
    ->group(function () {

        Route::get('/post', App\Http\Controllers\Admin\Post\IndexController::class)
            ->name('admin.post.index');

    });

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AUTH (Laravel UI only)
|--------------------------------------------------------------------------
*/

Auth::routes();
