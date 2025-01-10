<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'isCertifications'=>$this->isCertifications?'Yes':'No',
            'Tauxannulation'=>$this->annulation,
            'isAnimal'=>$this->isAnimal?'Yes':'No',
            'isAreasFumeur'=>$this->isAreasFumeurs?'Yes':'No',
            // 'installations'=>InstallationResource::collection($this->installations),
            'hotel'=>new bienResource($this->bien),
        ];
    }
}
