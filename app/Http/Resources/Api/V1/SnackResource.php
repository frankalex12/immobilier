<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SnackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ambience' => $this->ambience,
            'style' => $this->style,
            'logo' => $this->logo,
            'particularite' => $this->particularite,
            'Annulation_politique' => $this->Annulation_politique,
            'Modification_politique' => $this->Modification_politique,
            'proposition_annulation_politique' => $this->proposition_annulation_politique,
            'parking_infos' => $this->parking_infos,
            'Snack' => new bienResource($this->bien),
            'horaires' =>HoraireResource::collection($this->horaires),
            'evenements' =>  EvenementResource::collection($this->evenementSnack),
            'produits' =>  ProduitResource::collection($this->produitSnack),



            // 'isAcheter'=>$this->isAcheter?'Yes':'No',

        ];
    }
}
