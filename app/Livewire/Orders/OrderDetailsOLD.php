<?php

namespace App\Livewire\Orders;

use App\Models\customer_info;
use App\Models\order;
use App\Models\product;
use Livewire\Component;
use Livewire\Attributes\Layout;

class OrderDetails extends Component
{

    public $id;


    #[Layout('admin.livewireLayout')]
    public function render()
    {
        $orderData = order::find($this->id);
        $userInfo = customer_info::where('user_id', $orderData->user_id)->get();
        $orderProdutcs = [];


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
