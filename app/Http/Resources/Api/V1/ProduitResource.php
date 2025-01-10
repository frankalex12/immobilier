<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
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
            'produit' => $this->produit,
            'photo' => $this->photo,
            'prix' => $this->prix,
            'description' => $this->description,
            'isPublier' => $this->isPublier ?'Yes':'No',
            'snack' => new SnackResource($this->snack),
        ];
    }
}
