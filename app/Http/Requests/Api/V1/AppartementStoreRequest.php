<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AppartementStoreRequest extends FormRequest
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

            'pieces' => 'required|integer',
            'superficie' => 'required|numeric',
            'etage' => 'required|integer',
            'isAcenseur' => 'required|boolean',
            'isBalcon' => 'required|boolean',
            'isTerrasse' => 'required|boolean',
            'MontantMensuel' => 'required|numeric',
            'MontantGarantie' => 'required|numeric',
            'typeBail' => 'required|string',
            'PerformenceEnergie' => 'required|string',
            'RisqueNaturel' => 'required|string',
            'DebutBail' => 'required|date',
            'FinBail' => 'required|date:dd/mm/yy',
            'CondRealisation' => 'required|string',
            'isOccupe' => 'required|boolean',


            'telephone' => 'string',
            'firstname' => 'string',
            'lastname' => 'string',

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


// "Location": {
//     "titre": "Sales Manager",
//     "quatier": "es_MX",
//     "adress": "91828 Kiehn Grove\nSouth Christychester, NV 55406",
//     "accessService": "Et autem incidunt sequi ducimus et qui et. Et aspernatur adipisci error numquam est consequatur nam. Consequatur molestiae vel aut debitis. Doloremque error ipsum quos omnis perferendis.",
//     "ImageAvant": "C:\\Users\\FANTASMA\\AppData\\Local\\Temp\\fak7D2.tmp"
// },
// "pieces": 3625,
// "superficie": 191026328.71781,
// "etage": 3489120,
// "isAcenseur": 0,
// "isBalcon": 0,
// "isTerrasse": 0,
// "MontantMensuel": 15000,
// "MontantGarantie": 422446357,
// "typeBail": "Durward Gottlieb",
// "PerformenceEnergie": "Aut consectetur voluptatum cumque aliquam aliquid asperiores officiis. Aut quos sit velit.",
// "RisqueNaturel": "Quod rerum est corporis perferendis dolores. Aut itaque non ullam mollitia nulla dolores porro. Veritatis et ut voluptatem autem magnam.",
// "DebutBail": "2000-05-27",
// "FinBail": "1981-07-04",
// "CondRealisation": "Quia sit nam magnam velit voluptatem. Modi recusandae est sit excepturi modi sed. Sint non reprehenderit quia sunt.",
// "isOccupe": 0,
// "proprietaire": {
//     "telephone": "+1-234-812-4372",
//     "firstname": "Alayna",
//     "lastname": "DuBuque"
// }
// }
