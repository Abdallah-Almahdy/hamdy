<?php

namespace App\Http\Resources;

use App\Models\section;
use Illuminate\Http\Request;
use App\Http\Resources\productsResource;
use App\Http\Resources\sectionsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class sectionsAndproductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'sections' => sectionsResource::collection($this->sub_sections),
            'products' => productsResource::collection($this->products),
        ];
    }
}
