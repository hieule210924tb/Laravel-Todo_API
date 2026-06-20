<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

//mặc định laravel sẽ thêm prefix '/api' vào trước
//vidu /api/test
// Route::get('test', function () {
//     return response()->json([
//         'success' => true,
//         'message'  => 'Test API thành công',
//         'status_code' => 201
//     ], 201);
// });

// Route::get('todo', [TodoController::class, 'index']);
// Route::post('todo', [TodoController::class, 'store']);
// Route::get('todo/{id}', [TodoController::class, 'show']);
// Route::put('todo/{id}', [TodoController::class, 'update']);
// Route::delete('todo/{id}', [TodoController::class, 'destroy']);

// Route::apiResource('todo', TodoController::class); // apiResource tự động sinh ra 5 routes trên

Route::post('login', [AuthController::class, 'login']);

//check api bằng sanctum laravel

Route::middleware('auth:sanctum')->group(function () {
    Route::get('todo', [TodoController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);
});