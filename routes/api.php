<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post(
    '/comment',
    [CommentController::class, 'store']
)->name('comments.store');

Route::post(
    '/articles/{article}/increment-views',
    [ArticleController::class, 'incrementViews']
)->name('api.articles.increment-views');

Route::post(
    '/articles/{article}/like',
    [ArticleController::class, 'like']
)->name('api.articles.like');
