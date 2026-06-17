<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

//mặc định laravel sẽ thêm prefix '/api' vào trước
//vidu /api/test
Route::get('test', function () {
    return response()->json([
        'success' => true,
        'message'  => 'Test API thành công',
        'status_code' => 201
    ], 201);
});

Route::post('todo', [TodoController::class, 'store']);