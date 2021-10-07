<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipController;

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

Route::get('/', function () {
    return view('index');
});
// category
Route::get('/category', [CategoryController::class,'index']);
Route::post('/category', [CategoryController::class,'store']);
Route::delete('/category/{item}', [CategoryController::class,'destroy']);
Route::get('/category/{item}/edit', [CategoryController::class,'edit']);
Route::patch('/category/{item}', [CategoryController::class,'update']);
// food
Route::get('/food', [FoodController::class,'index']);
Route::post('/food', [FoodController::class,'store']);
Route::delete('/food/{item}', [FoodController::class,'destroy']);
Route::get('/food/{item}/edit', [FoodController::class,'edit']);
Route::patch('/food/{item}', [FoodController::class,'update']);
// price
Route::get('/recip/{item}', [RecipController::class,'index']);
Route::post('/recip', [RecipController::class,'store']);
Route::delete('/recip/{recip}', [RecipController::class,'destroy']);