<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('article')->group(
            function () {
                Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
                Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
            }
        );
    }
);
