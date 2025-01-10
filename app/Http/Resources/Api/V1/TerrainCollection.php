<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TerrainCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,

                    // 'meta' => [
                    //     'links' => [
                    //         'self' =>'link-value',
                    //     ]
            // ]
        ];
    }
    // public function paginationInformation($request, $paginated, $default) {

    //     $default['links']['custom']= '/api/geust/terrains';
    // }

}
