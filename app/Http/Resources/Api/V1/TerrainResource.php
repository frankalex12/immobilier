<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TerrainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return[
            'id'=>$this->id,
            'superficie'=>$this->superficie.' m2',
            'orientation'=>$this->orientation,
            'topographie'=>$this->topographie,
            'NatureSol'=>$this->NatureSol,
            'StatusConstuctible'=>$this->StatusConstuctible,
            'prix'=>$this->prix,
            'isNegociable'=>$this->isNegociable?'Yes':'No',
            'typeBail'=>$this->typeBail,
            'performanceEnergie'=>$this->performanceEnergie,
            'risqueNaturel'=>$this->risqueNaturel,
            'isAcheter'=>$this->isAcheter?'Yes':'No',
            'Terrain'=>new bienResource($this->bien),

        ];


    }

    // public $preserveKey = true;
}
