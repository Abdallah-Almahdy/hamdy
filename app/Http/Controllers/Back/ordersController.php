<?php

    namespace App\Http\Controllers\Back;

    use App\Models\order;
    use App\Models\product;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\customer_info;
    use Illuminate\Support\Facades\Gate;

    class ordersController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {

            Gate::authorize('showOrdersSidebar', order::class);
            $orders = order::all();


            return view('pages.orders.index', [
                'orders' => $orders,
            ]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         */
        public function print($id)
        {

            $orderData = order::find($id);
            $userInfo = customer_info::where('user_id', $orderData->user_id)->get();
            $orderProdutcs = [];


            foreach ($orderData->orderProducts as $product) {
                $orderProdutcs[] = [
                    'porductData' => product::find($product->product_id),
                    'porductCount' =>  $product->totalCount,
                    'porductTotalPrice' =>  $product->totalPrice
                ];
            }

            $printData = [
                'orderData' => $orderData,
                'userInfo' => $userInfo[0],
                'orderProdutcs' => $orderProdutcs
            ];
            return view('pages.orders.print', ['data' => $printData]);
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(order $order)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, order $order)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(order $order)
        {
            //
        }


        public function orderDetails(){

            return view('pages.orders.orderDetail');
        }
    }
