<?php

namespace App\Livewire\Orders;

use Carbon\Carbon;
use App\Models\customer_info;
use App\Models\order;
use App\Models\orderTracking;
use App\Models\product;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{

    public function done($id)
    {
        order::where('id', $id)->update(['status' => 1]);
        orderTracking::where('order_id', $id)->update(['status' => 3]);
    }
    public function prep($id)
    {
        orderTracking::where('order_id', $id)->update(['status' => 1]);
    }
    public function delivery($id)
    {
        orderTracking::where('order_id', $id)->update(['status' => 2]);
    }
    public function cancel($id)
    {
        order::where('id', $id)->update(['status' => 2]);
        orderTracking::where('order_id', $id)->update(['status' => 3]);
    }



    #[Layout('admin.livewireLayout')]
    public function render()
    {

        $orderBasic = [];

        // Get today's date
        $today = Carbon::today();

        // Query orders with status 0 (pending) for today
        $orders = Order::where('status', 0)
            ->get();

        // Query failed orders (status 2) for today
        $faildOrders = Order::where('status', 2)
            ->whereDate('created_at', $today)
            ->get();

        // Query successful orders (status 1) for today
        $successedOrders = Order::where('status', 1)
            ->whereDate('created_at', $today)
            ->get();
        $inPreperOrders = [];
        $inDeliveryOrders = [];

        foreach ($orders as $order) {



            switch ($order->orderTracking[0]->status) {
                case 0:
                    $orderBasic[] = $order;
                    break;
                case 1:
                    $inPreperOrders[] = $order;
                    break;
                case 2:
                    $inDeliveryOrders[] = $order;
                    break;
                default:
                    break;
            }
        }


        foreach ($orders as $order) {
            $order['user_info'] = customer_info::where('user_id', $order->user_id)->get()[0];
        }
        foreach ($faildOrders as $order) {
            $order['user_info'] = customer_info::where('user_id', $order->user_id)->get()[0];
        }
        foreach ($successedOrders as $order) {
            $order['user_info'] = customer_info::where('user_id', $order->user_id)->get()[0];
        }
        foreach ($inPreperOrders as $order) {
            $order['user_info'] = customer_info::where('user_id', $order->user_id)->get()[0];
        }
        foreach ($inDeliveryOrders as $order) {
            $order['user_info'] = customer_info::where('user_id', $order->user_id)->get()[0];
        }


        return view('livewire.orders.index', [
            'orders' => collect($orderBasic)->reverse(),
            'faildOrders' => collect($faildOrders)->reverse(),
            'successedOrders' => collect($successedOrders)->reverse(),
            'inPreperOrders' => collect($inPreperOrders)->reverse(),
            'inDeliveryOrders' => collect($inDeliveryOrders)->reverse(),
        ]);
    }
}
