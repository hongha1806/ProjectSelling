<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5',
            'email' => 'email',
            'avatar' => 'max:2048'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute không đúng định dạng',
            'max' => ':attribute nhỏ hơn :max'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Full Name',
            'email' => 'Email',
            'avatar' => 'Avatar'
        ];
    }
}
