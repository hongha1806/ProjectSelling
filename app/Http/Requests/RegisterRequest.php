<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute không đúng định dạng',
            'max' => ':attribute nhỏ hơn :max',
            'min' => ':attribute lớn hơn :min',
            'image' => ':attribute phải là ảnh',
            'mimes' => ':attribute không đúng định dạng'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone No',
            'avatar' => 'Avatar'
        ];
    }
}
