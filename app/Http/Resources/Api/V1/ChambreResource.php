<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChambreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->id,
            "type"=>$this->type,
            "superficie"=>$this->superficie,
            "image"=>$this->image,
            "prixJour"=>$this->prixJour,
            "prixNuit"=>$this->prixNuit,
            "Offres" =>$this->Offres,
            "reduction"=>$this->reduction,
            "hotel"=>new HotelResource($this->hotel),
        ];
    }
}
