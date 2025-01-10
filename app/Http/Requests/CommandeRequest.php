<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
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
            'curency' => 'string|required',
            'email' => 'required|email',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone_number' => 'required|numeric',
            'addresse' => 'required|string',
            'city' => 'required|string',
            'contry' => 'required|string',
            'zip_code' => 'required|string'
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
