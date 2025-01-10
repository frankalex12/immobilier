<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FavorisEvenementRequest extends FormRequest
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
            'evenement_snack_id'=>'required|numeric'
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
