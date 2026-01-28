<?php

namespace App\Http\Resources;

use App\Models\product;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class userOrderProductsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $product = product::find($this->product_id);
        // $category = section::find($product->section_id);
        // dd($this->product_id);
        return  [
            "product" => [
                "id" => $this->product_id,
                // "name" =>  $product->name,
                // "description" => $product->description,
                // "price" => $product->price,
                // 'image' => env('IMG_BASE_LINK') . $product->photo,
                // "category" => $category->name,
            ],
            "quantity" => $this->totalCount
        ];
    }
}

/*
orders product table

     'product_id',
        'order_id',
        'totalPrice',
        'totalCount'



*/
