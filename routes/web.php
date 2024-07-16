<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "show"] );
// Route::view('/layout', 'layouts.app');

Route::controller(PostsController::class)->group(function(){
    
    Route::get('posts/create', "create");
    Route::get('posts/{post}', "show");
    Route::post('posts', "store");
    Route::get('posts/{post}/edit', "edit");
    Route::patch('posts/{post}', "update");
    Route::delete('posts/{post}', "destroy");

});


Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
