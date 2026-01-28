<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class  sectionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'cat_id' => $this->id,
            'cat_name' => $this->name,
            'image' => env('IMG_BASE_LINK') . $this->photo,

        ];
    }
}
