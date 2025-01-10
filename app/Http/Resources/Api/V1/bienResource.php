<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class bienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return[
            'titre' => $this->titre,
            'quatier' =>$this->quatier ,
            'adress' =>$this-> adress,
            'accessService' =>$this->accessService,
            'ImageAvant' =>$this->ImageAvant ,
            'proprietaire'=>new ProprietaireResource($this->proprietaire),
            'images'=>ImageBienResouce::collection($this->images)
        ];
    }
}
