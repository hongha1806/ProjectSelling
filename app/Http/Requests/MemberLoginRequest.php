<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute không đúng định dạng',
            'min' => ':attribute lớn hơn :min'
        ];
    }
    public function attributes(){
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
