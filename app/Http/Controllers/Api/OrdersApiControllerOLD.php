<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\section;
use App\Models\orderProduct;
use Illuminate\Http\Request;
use App\Models\customer_info;
use App\Models\orderTracking;
// use App\Http\Controllers\Controller;

class OrdersApiController extends Controller
{
    public function create_order(Request $request)
    {

        $user = User::find($request->user_id);
        if ($user) {
            $order_data = order::create([
                'user_id' => $request->user_id,
                'totalPrice' => $request->orderTotalPrice,
                'address' => $request->userAddress,
                'phoneNumber' => customer_info::where('user_id', $request->user_id)->get()[0]->phonenum,
                'status' => 0,
                'payment_method' => $request->orderPaymentMethod,
            ]);

            $order_tracking_data = [
                'user_id'  => $order_data->user_id,
                'order_id' => $order_data->id,
                'status' => 0,
            ];
            orderTracking::create($order_tracking_data);


            // $products = [];
            foreach ($request->orderProducts as $product) {
                $products[] = orderProduct::create([
                    'product_id' => $product['productId'] + 0,
                    'order_id' => $order_data->id,
                    'totalCount' => $product['quantity'],
                    'totalPrice' => $product['quantity'] * product::find($product['productId'])->price,
                ]);
            }


            return response()->json([

                'message' => 'order done',
                'code' => '200'
            ], 200);
        } else {
            return response()->json([

                'message' => 'couldn\'t find this user, or user does not exist',
                'code' => '404'
            ], 404);
        }
    }


    public function get_all_orders(Request $request)
    {

        $user = User::find($request->query('user_id'));
        if ($user) {

            $data = [];

            $user_info = customer_info::where('user_id', $request->query('user_id'))->get()[0];


            $data['user_data'] = [


                "userName" =>  $user_info->firstName .
                    $user_info->lastName,

                "userPhoneNumer" => $user_info->phonenum,

            ];

            $data['user_orders'] = [];

            foreach ($user->orders as $order) {
                $orderProducts = [];
                $Products = $order->orderProducts;
                $userInfo = customer_info::where('user_id', $order->user_id)->get()[0];

                foreach ($Products as $product) {
                    $productInfo = product::find($product->product_id);
                    $category = section::find($productInfo->section_id);


                    $orderProducts[] =  [
                        'productInfo' => [
                            "id" => $product->product_id,
                            "name" => $productInfo->name,
                            "detail" => $productInfo->description,
                            "price" => $productInfo->price,
                            "offer_rate" => $productInfo->offer_rate,
                            "unit_name" => 'ج.م',
                            "image" => env('IMG_BASE_LINK') . $productInfo->photo,
                            "category" => $category->name,
                        ],
                        'quantity' => $product->totalCount
                    ];
                }

                if ($order->address == 1) {
                    $address =
                        $userInfo->addressCountry .
                        ' ,' .
                        $userInfo->addresscity .
                        ' ,' .
                        $userInfo->addressstreet .
                        ' ,' .
                        $userInfo->addressbuildingNumber .
                        ' ,' .
                        $userInfo->addressfloorNumber .
                        ' ,' .
                        $userInfo->addressApartmentNumber .
                        ' ,' .
                        $userInfo->disSign;
                } elseif ($order->address == 2) {
                    $address =
                        $userInfo->addressCountry2 .
                        ' ,' .
                        $userInfo->addresscity2 .
                        ' ,' .
                        $userInfo->addressstreet2 .
                        ' ,' .
                        $userInfo->addressbuildingNumber2 .
                        ' ,' .
                        $userInfo->addressfloorNumber2 .
                        ' ,' .
                        $userInfo->addressApartmentNumber2 .
                        ' ,' .
                        $userInfo->disSign2;
                } else {
                    $address = null;
                }


                $data['user_orders'][] =
                    [
                        "orderId" => $order->id,
                        "orderTotalPrice" => $order->totalPrice,
                        "orderStatus" => $order->status,
                        "orderTrackingStatus" =>  orderTracking::where('user_id', $request->query('user_id'))
                            ->where('order_id', $order->id)
                            ->latest()
                            ->first()->status,
                        "orderPaymentMethod" => $order->payment_method,
                        "orderDate" => $order->created_at->format('Y-m-d H:i:s'),
                        "userAddress" =>  $address,
                        "orderProducts" =>  $orderProducts,



                    ];
            }




            return response()->json([
                'data' =>  $data,
                'message' => 'order done',
                'code' => '200'
            ], 200);
        } else {
            return response()->json([

                'message' => 'couldn\'t find this user, or user does not exist',
                'code' => '404'
            ], 404);
        }
    }
}
