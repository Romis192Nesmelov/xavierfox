<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)->name('home');
Route::get('/{slug}',ChapterController::class)->name('chapter');
Route::get('/{slug}/{subSlug?}',ArticleController::class)->name('article');
