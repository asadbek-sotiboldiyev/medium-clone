<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

Route::get('/', [PagesController::class, 'home']);

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])
        ->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/register', [AuthController::class, 'registerView'])
        ->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');
});

Route::prefix('/articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])
        ->name('articleIndex');
    Route::get('/add', [ArticleController::class, 'store'])
        ->name('articleStore')
        ->middleware('auth');
    Route::post('/add', [ArticleController::class, 'create'])
        ->name('articleCreate')
        ->middleware('auth');
    Route::get('/{id}', [ArticleController::class, 'show'])
        ->name('articleShow');
});

Route::prefix('/writer')->group(function (){
    Route::get('/{username}', [UserController::class, 'show'])
        ->name('userShow');
});