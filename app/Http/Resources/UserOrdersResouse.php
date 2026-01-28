<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserOrdersResouse extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
