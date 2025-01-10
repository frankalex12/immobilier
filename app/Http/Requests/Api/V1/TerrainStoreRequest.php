<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TerrainStoreRequest extends FormRequest
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


            'titre' => 'required|string',
            'quatier' => 'required|string',
            'adress' => 'required|string',
            'accessService' => 'required|string',
            'ImageAvant' => 'image',

            'superficie'=>'required|numeric',
            'orientation'=>'required|string',
            'topographie'=>'required|string',
            'NatureSol'=>'required|string',
            'StatusConstuctible'=>'required|string',
            'prix'=>'required|numeric',
            'isNegociable'=>'required|boolean',
            'typeBail'=>'required|string',
            'performanceEnergie'=>'required|string',
            'risqueNaturel'=>'required|string',
            'isAcheter'=>'required|boolean',

            'telephone' => 'string|required',
            'firstname' => 'string|required',
            'lastname' => 'string|required',
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
