<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;


class TodoController extends Controller
{
    public function store(TodoRequest $request)
    {
        //validate dữ liệu trước khi insert vào bảng todo
        $todo = Todo::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Test thành công',
            'data' => $todo
        ], 201);
    }
}