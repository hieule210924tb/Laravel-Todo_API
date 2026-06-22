<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Jobs\ProcessTodoJob;
use App\Models\Todo;

// CRUD cho Todo
class TodoController extends Controller
{
    public function index()
    {
        $todo =  Todo::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Hiển thị dữ liệu todo',
            'data' =>  TodoResource::collection($todo) // chỉ lấy ra các trường mà TodoResource đã config
        ], 200);
    }
    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Hiển thị dữ liệu chi tiết todo',
            'data' => new TodoResource($todo)
        ], 200);
    }
    public function store(TodoRequest $request)
    {
        //validate dữ liệu trước khi insert vào bảng todo
        $todo = Todo::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        //Đẩy 1 công việc gì đó vào trong queueđể xử lý
        ProcessTodoJob::dispatch($todo);
        return response()->json([
            'success' => true,
            'message' => 'Thêm mới todo thành công',
            'data' => $todo
        ], 201);
    }
    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($id);
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        $todo->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật todo thành công',
            'data' => $todo
        ], 200);
    }
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'success' => true,
                'message' => 'Thông tin không hợp lệ',
                'data' => null
            ], 200);
        }
        $todo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xóa todo thành công',
            'data' => null
        ], 200);
    }
}