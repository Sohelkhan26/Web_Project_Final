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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
                'address' => 'required|string',
                'username' => 'required|string|unique:users,username',
                'city' => 'required|string',
                'phone' => 'required|string',
                'division' => 'required|string',
                'zip' => 'required|string',
        ];
    }
}
