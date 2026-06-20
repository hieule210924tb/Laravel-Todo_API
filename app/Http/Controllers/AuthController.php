<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //Cách xác thực 
        //Cách 1
        $user = User::where('email', $data['email'])->first();
        if (!$data) {
            return response()->json([
                'message' => 'Email không hợp lệ'
            ], 401);
        }
        // Cách 2: Xác thực người dùng với guard web
        // if (!Auth::attempt($data)) {
        //     return response()->json([
        //         'message' => 'Đăng nhập không thành công vui lòng kiểm tra lại',
        //     ], 401);
        // }
        // $user = Auth::user();

        //Tạo bear token
        $token = $user->createToken('todo-token')->plainTextToken;
        return response()->json([
            'message' => 'ok',
            'token' => $token
        ], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Bạn đã logout thành công'
        ], 200);
    }
}