<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class productCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'prod_id' => $this->id,
            'name' => $this->name,
            'detail' => $this->description,
            'price' => $this->price,
            'image' => env('IMG_BASE_LINK') . $this->photo,
            'product_quantity' => $this->qnt,
            'nutritionWeight' => 0,
            'cat_id' => $this->section_id,
            'unit_name' => 'ج.م',
            'purchase_count' => $this->purchase_count,
            'offer_rate' => $this->offer_rate,
        ];
    }
}
