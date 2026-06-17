<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // true: ai cũng có quyền truy cập
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10',
            'content' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Tiêu đề bắt buộc phải nhập",
            'title.min' => "Tiêu đề phải có tối thiểu 10 kí tự",
            'content.required' => "Nội dung bắt buộc phải nhập"
        ];
    }
}