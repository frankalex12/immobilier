<?php

namespace App\Http\Requests\Auth;

// use Illuminate\Contracts\Validation\Validator;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

// use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'name'=>'required|string|min:4',
            'lastname'=>'required|string|min:4',
            'photo'=>'image',
            'confirmpassword'=>'required|string|min:8'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message'=>'invalide data send ',
            'details'=> $validator->errors()
        ]);

        throw new HttpResponseException($response);
    }

}
