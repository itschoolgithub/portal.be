<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get("/articles", [ArticleController::class, "index"]);
Route::get("/articles/{article}", [ArticleController::class, "show"]);
