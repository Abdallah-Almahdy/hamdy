<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;


class userOrderResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "orderId" => $this->id,
            "orderTotalPrice" => $this->totalPrice + 0,
            "orderStatus" => $this->status,
            "orderDate" => $this->created_at,
        ];
    }
}
/*
orders table

        'user_id',
        'totalPrice',
        'address',
        'phoneNumber',
        'delivery_id',
        'status',
        'payment_method',

*/
