<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GendreController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth:sanctum']],function () {
    
});

Route::resource('author', AuthorController::class)->except(['create', 'edit', 'show']);
Route::resource('gendre', GendreController::class)->except(['create', 'edit', 'show']);
Route::resource('game', GameController::class)->except(['create', 'edit', 'show']);
