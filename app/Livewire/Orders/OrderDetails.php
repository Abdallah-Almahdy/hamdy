<?php

namespace App\Livewire\Orders;

use App\Models\customer_info;
use App\Models\delivery;
use App\Models\order;
use App\Models\product;
use App\Models\PromoCode;
use Livewire\Component;
use Livewire\Attributes\Layout;

class OrderDetails extends Component
{

    public $id;


    #[Layout('admin.livewireLayout')]
    public function render()
    {
        $orderData = order::find($this->id);
        $orderData['promo_name'] = PromoCode::find($orderData['promo_code_id'])['code'] ?? null;
        $userInfo = customer_info::where('user_id', $orderData->user_id)->get();
        $orderProdutcs = [];


        // Handle address country names
        $addressCountry1Id = $userInfo[0]->addressCountry ? (int) $userInfo[0]->addressCountry : null;
        $addressCountry2Id = $userInfo[0]->addressCountry2 ? (int) $userInfo[0]->addressCountry2 : null;

        $addressCountryName = $addressCountry1Id
            ? delivery::where('id', $addressCountry1Id)->value('name')
            : null;

        $addressCountry2Name = $addressCountry2Id
            ? delivery::where('id', $addressCountry2Id)->value('name')
            : null;


        // Attach the country names to the user info object
        $userInfo[0]->addressCountryName = $addressCountryName;
        $userInfo[0]->addressCountry2Name = $addressCountry2Name;

        foreach ($orderData->orderProducts as $product) {
            $orderProdutcs[] = [
                'porductData' => product::find($product->product_id),
                'porductCount' =>  $product->totalCount,
                'porductTotalPrice' =>  $product->totalPrice
            ];
            // $orderProdutcs[] = product::find($product->product_id);
            // $orderProdutcs[]->productCount = $product->totalCount;
        }

        $printData = [
            'orderData' => $orderData,
            'userInfo' => $userInfo[0],
            'orderProdutcs' => $orderProdutcs
        ];
        // dd($orderData->orderTracking[0]->status);
        return view('livewire.orders.order-details', [
            'orderData' => $orderData,
            'userInfo' => $userInfo[0],
            'orderProdutcs' => $orderProdutcs,
            'printData' =>  $printData
        ]);
    }
}
