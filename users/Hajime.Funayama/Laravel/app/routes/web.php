<?php

use App\Http\Controllers\SortableController;
use App\Http\Controllers\taskController;

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

Route::get('/', [SortableController::class, 'index']);
Route::post('/register', [SortableController::class, 'register']);
Route::post('/update', [SortableController::class, 'update']);

Route::get('/task', [TaskController::class, 'index']);
Route::post('task/register', [TaskController::class, 'register']);
Route::post('task/delete', [TaskController::class, 'delete']);