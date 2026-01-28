<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class banaresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if ($this->click) {
            return [
                'id' => $this->id,
                'image' => env('IMG_BASE_LINK') . $this->path,
                'main_sec_id' => $this->main_sec_id,
                'sub_sec_id' => $this->sub_sec_id,
                'product_id' => $this->product_id,
                'offers' => $this->offers,
                'click' => $this->click,


            ];
        } else {
            return [
                'id' => $this->id,
                'image' => env('IMG_BASE_LINK') . $this->path,
                'click' => $this->click,


            ];
        };
    }
}
