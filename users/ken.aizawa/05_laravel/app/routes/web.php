<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SortableController;

Route::get('/', [SortableController::class, 'index']);
Route::post('/register', [SortableController::class, 'register']);
Route::post('/update', [SortableController::class, 'update']);

// ここに /task のルートを追加してください
Route::get('/task', function () {
    return 'タスク管理ツール';
});
