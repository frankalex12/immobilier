<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppartementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'=>$this->id,
            'pieces'=>$this->pieces,
            'superficie'=>$this->superficie.'m2',
            'etage'=>$this->etage,
            'isAcenseur'=>$this->isAcenseur?'Yes':'No',
            'isBalcon'=>$this->isBalcon?'Yes':'No',
            'isTerrasse'=>$this->isTerrasse?'Yes':'No',
            'MontantMensuel'=>$this->MontantMensuel.'FCFA',
            'MontantGarantie'=>$this->MontantGarantie.'FCFA',
            'typeBail'=>$this->typeBail,
            'PerformenceEnergie'=>$this->PerformenceEnergie,
            'RisqueNaturel'=>$this->RisqueNaturel,
            'DebutBail'=>$this->DebutBail,
            'FinBail'=>$this->FinBail,
            'CondRealisation'=>$this->CondRealisation,
            'isOccupe'=>$this->isOccupe?'Yes':'No',
            'Location'=>new bienResource($this->bien),


        ];
    }
}
