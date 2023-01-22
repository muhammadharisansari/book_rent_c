<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('only_guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('/');
    Route::post('/', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('books', [BookController::class, 'index']);
    Route::get('book-add', [BookController::class, 'add'])->middleware('only_admin');
    Route::post('book-add', [BookController::class, 'store'])->middleware('only_admin');
    Route::get('book-edit/{slug}', [BookController::class, 'edit'])->middleware('only_admin');
    Route::post('book-edit/{slug}', [BookController::class, 'update'])->middleware('only_admin');

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');

    Route::get('categories', [CategoryController::class, 'index'])->middleware('only_admin');
    Route::get('category-add', [CategoryController::class, 'add'])->middleware('only_admin');
    Route::post('category-add', [CategoryController::class, 'store'])->middleware('only_admin');
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit'])->middleware('only_admin');
    Route::patch('category-edit/{slug}', [CategoryController::class, 'update'])->middleware('only_admin');
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete'])->middleware('only_admin');
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy'])->middleware('only_admin');
    Route::get('category-deleted', [CategoryController::class, 'deletedCategory'])->middleware('only_admin');
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore'])->middleware('only_admin');

    Route::get('users', [UserController::class, 'index'])->middleware('only_admin');

    Route::get('rent-logs', [RentLogController::class, 'index'])->middleware('only_admin');
});
