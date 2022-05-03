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
Route::get('/constr/{id}', [MainController::class, 'constr']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/check_tel/{tel}', [AuthController::class, 'check_tel']);
Route::post('/login', [AuthController::class, 'login_process']);
Route::get('/add_basket/{id}', [MainController::class, 'add_basket']);
Route::get('/all_card', [MainController::class, 'all_card']);
Route::get('/all_product', [MainController::class, 'all_product']);
Route::get('/card_basket/{id}', [MainController::class, 'card_basket']);
Route::post('/add_const_pizza', [MainController::class, 'add_const_pizza']);
Route::get('/const_pizza_all', [MainController::class, 'const_pizza_all']);
Route::post('/edit_const_pizza/{id}', [MainController::class, 'edit_const_pizza']);
Route::get('/delete_ingradient/{id}', [MainController::class, 'delete_ingradient']);

Route::post('/add_const_chudu', [MainController::class, 'add_const_chudu']);
Route::get('/const_chudu_all', [MainController::class, 'const_chudu_all']);
Route::post('/edit_const_chudu/{id}', [MainController::class, 'edit_const_chudu']);
Route::get('/delete_ingradient_chudu/{id}', [MainController::class, 'delete_ingradient_chudu']);

Route::post('/add_arrange/{products}', [MainController::class, 'add_arrange']);





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
    Route::post('/edit_category_card/{id}', [MainController::class, 'edit_category_card']);
    Route::get('/delete_category_card/{id}', [MainController::class, 'delete_category_card']);
});
