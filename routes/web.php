<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [MainController::class, 'welcome'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/check_tel/{tel}', [AuthController::class, 'check_tel']);
Route::post('/login', [AuthController::class, 'login_process']);
Route::post('/register', [AuthController::class, 'register_process']);



Route::middleware('auth')->group(function () {
    Route::get('/exit', [AuthController::class, 'exit']);
    Route::get('/admin', [MainController::class, 'admin'])->name('admin');
    Route::post('/admin', [MainController::class, 'admin_process']);
    Route::post('/main/{id}', [MainController::class, 'main_process']);
    Route::get('/main_home', [MainController::class, 'main_home_process']);
    Route::post('/main_home_edit', [MainController::class, 'main_home_edit']);
    Route::post('/add_category', [MainController::class, 'add_category']);
    Route::get('/menu_category', [MainController::class, 'menu_category']);
    Route::post('/edit_category/{id}', [MainController::class, 'edit_category']);
    Route::get('/delete_category/{id}', [MainController::class, 'delete_category']);
    Route::post('/add_category_card/{id}', [MainController::class, 'add_category_card']);
    Route::get('/menu_category_card', [MainController::class, 'menu_category_card']);
});
