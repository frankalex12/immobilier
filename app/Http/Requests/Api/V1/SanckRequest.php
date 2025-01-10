<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SanckRequest extends FormRequest
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
            'telephone' =>'required|numeric|min:9',
            'firstname'=>'required',
            'lastname'=>'required',

            'titre' => 'required',
            'quatier' =>'required',
            'adress' => 'required',
            'accessService' =>'required',
            'ImageAvant' =>'file',
            'logo'=>'file',

            'ambience'=>'required',
            'style'=>'required',
            'particularite' =>'required',
            'Annulation_politique' =>'required',
            'Modification_politique'=>"required",
            'proposition_annulation_politique'=>'required',
            'parking_infos'=>'required',

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
