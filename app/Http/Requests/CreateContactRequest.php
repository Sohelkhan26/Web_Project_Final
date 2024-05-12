<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email',
            'phone' => 'required|string',
            'job' => 'string',
            'company' => 'string',
            'address' => 'string',
            'birthdate' => 'date',
            'image' => 'image',
            'note' => 'text',
            'zip' => 'numeric',
            'city' => 'string',
            'division' => 'string',
//            'user_id' => 'required|exists:users,id',
        ];
    }
}
