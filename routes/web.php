<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-cache', function () {
    Cache::put('demo', 'Giá trị cache số 1', 30);
    $checkDemo = Cache::has('demo');

    $valueCache = Cache::get('demo');
    return response()->json([
        'checkDemo' => $checkDemo,
        'valueCheck' => $valueCache
    ], 200);
});
