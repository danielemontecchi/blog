<?php

use App\Http\Controllers\{BlogController, PageController};
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('pages.home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/{slug}', [PageController::class, 'page'])->name('pages.page');
