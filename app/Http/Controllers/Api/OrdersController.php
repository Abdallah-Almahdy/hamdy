<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\PromoCode;
use App\Models\subSection;
use App\Models\orderProduct;
use Illuminate\Http\Request;
use App\Models\customer_info;
use App\Models\orderTracking;
use App\Models\PromoCodeUser;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\prompCodeController;
use Termwind\Components\Dd;

class OrdersController extends Controller
{



    public function check_promocode(Request $request)
    {
        // dd('test');

        // Validate request parameters
        $request->validate([
            'promocode_id' => 'required',
            'user_id' => 'required',
            'orderTotalPrice' => 'required'
        ]);

        // Get parameters
        $promoCode = $request->input('promocode_id');
        $userId = $request->input('user_id');
        $orderTotal = $request->input('orderTotalPrice');
        $products = $request->input('orderProducts');

        $promoCode_code = PromoCode::find($promoCode)->code;

        // if exist
        $promoCodeCheck = PromoCode::where('active', true)
            ->where('expiry_date', '>', now())
            ->where('code', $promoCode_code) // Ensure you're checking the correct promo code
            ->first();

        if (!$promoCodeCheck) {
            return response()->json([
                'status' => 'fail',
                'message' => 'كود غير صالح'
            ], 404);
        }

        // if it doesnt work with offers
        if ($promoCodeCheck->check_offer_rate == 0) {
            // code
            foreach ($products as $product) {
                if (product::find($product['productId'])->offer_rate > 0) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'هذا الكود لا يمكن إستخدامة مع منتج به عرض'
                    ], 404);
                }
            }
        }

        // if it doesnt belong to the user
        if ($promoCodeCheck->user_id !== null && $promoCodeCheck->user_id !== $userId + 0) {
            return response()->json([
                'status' => 'fail',
                'message' => 'هذا الكود لا يصلح لهذا المستخدم'
            ], 404);
        }

        // Find valid promo code
        $promo = PromoCode::where('code', $promoCode_code)
            ->where('active', true)
            ->where('expiry_date', '>', now())
            ->first();

        if (!$promo) {
            return response()->json([
                'status' => 'fail',
                'message' => 'كود غير صالح'
            ], 404);
        }

        // Check minimum order value
        if ($orderTotal < $promo->min_order_value) {
            return response()->json([
                'status' => 'fail',
                'message' => 'إجمالي الطلب اقل من الحد الأدني للخصم'
            ], 404);
        }


        if ($promoCodeCheck->available_codes != null) {
            // Check available_codes
            if ($promoCodeCheck->available_codes <= 0) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'تم الوصول للحد الأقصي للمستخدمين'
                ], 404);
            }
        }


        // Check user usage
        $hasUsed = PromoCodeUser::where('user_id', $userId)
            ->where('promo_id', $promo->id)
            ->exists();

        if ($hasUsed) {
            return response()->json([
                'status' => 'fail',
                'message' => 'لقد أستخدمت هذا العرض بالفعل'
            ],   404);
        }
        // type user / all
        // user unactive
        //  all if available_codes - 1
        // dd($promoCodeCheck);

        if ($promoCodeCheck->promo_cat == 'user') {
            if ($promoCodeCheck->user_id == $userId) {
                $promoCodeCheck->available_codes = $promoCodeCheck->available_codes - 1;
                $promoCodeCheck->active = 0;
                $promoCodeCheck->save();
            }
        } else {
            $promoCodeCheck->available_codes = $promoCodeCheck->available_codes - 1;
            if ($promoCodeCheck->available_codes == 0) {
                $promoCodeCheck->active = 0;
            }
            $promoCodeCheck->save();
        }


        return response()->json([
            'status' => true,
            'data' =>  $promo,
            'message' => 'تم تطبيق الخصم'
        ], 200);
    }

    public function create_order(Request $request)
    {
        if ($request->promocode_id) {
            $promoCodeResponse = $this->check_promocode($request);

            if ($promoCodeResponse->getStatusCode() != 200) {
                return $promoCodeResponse; // Return the failure response from check_promocode
            }
        }


        $request->validate([
            'user_id' => 'required',
            'orderTotalPrice' => 'required',
            'userAddress' => 'required',
            'orderPaymentMethod' => 'required',
            'orderProducts' => 'required|array',
        ]);


        $user = User::find($request->user_id);
        if ($user) {

            $order = [
                'user_id' => $request->user_id,
                'totalPrice' => $request->orderTotalPrice,
                'address' => $request->userAddress,
                'phoneNumber' => customer_info::where('user_id', $request->user_id)->get()[0]->phonenum,
                'status' => 0,
                'payment_method' => $request->orderPaymentMethod,
            ];
            if ($request->promocode_id) {
                $order['promo_code_id'] = $request->promocode_id;
            }
            $order_data = order::create($order);


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
                    'totalPrice' => $product['quantity'] * product::find($product['productId'] + 0)->price + 0,
                ]);
            }



            if ($request->promocode_id) {
                $data = [
                    'used' => 1,
                    'used_at' => now(),
                    'order_id' => $order_data->id,
                    'user_id' => $request->input('user_id'),
                    'promo_id' => $request->input('promocode_id'),
                ];


                PromoCodeUser::create($data);
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
                    $category = subSection::find($productInfo->section_id);


                    $orderProducts[] =  [
                        'productInfo' => [
                            "id" => $product->product_id,
                            "name" => $productInfo->name,
                            "detail" => $productInfo->description,
                            "price" => $productInfo->price,
                            "offer_rate" => $productInfo->offer_rate,
                            "unit_name" => 'ج.م',
                            "image" => env('IMG_BASE_LINK') . $productInfo->photo,

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





    public function cancel_order(Request $request)
    {
        $check_order = order::find($request->query('order_id'));

        $promoCodeCheck = PromoCode::find($check_order->promo_code_id);




        if ($promoCodeCheck->promo_cat == 'user') {
            if ($promoCodeCheck->user_id == $check_order->user_id) {




                $promoCodeCheck->available_codes = $promoCodeCheck->available_codes + 1;
                $promoCodeCheck->active = 1;
                $promoCodeCheck->save();
            }
        } else {
            if ($promoCodeCheck->available_codes == 0) {
                $promoCodeCheck->active = 1;
            }
            $promoCodeCheck->available_codes = $promoCodeCheck->available_codes + 1;




            $promoCodeCheck->save();
        }

        PromoCodeUser::where('order_id', $request->query('order_id'))
            ->where('user_id', $check_order->user_id)
            ->where('promo_id', $promoCodeCheck->id)->delete();




        if ($check_order) {


            $check_order->status = 2;
            orderTracking::where('order_id', $request->query('order_id'))->update(['status' => 3]);
            $check_order->save();
            return response()->json([
                'message' => 'order canceled',
                'code' => '200'
            ], 200);
        } else {
            return response()->json([

                'message' => 'couldn\'t find this order, or order does not exist',
                'code' => '404'
            ], 404);
        }
    }
}


/*

    {
  "user_info": {
    "userAddress": "عمارة 1",
  "userName": "user1",
  "userPhoneNumer": "0123456789",
  },
  "orderId": 0,
  "orderPaymentMethod": 0,
  "orderTotalPrice": "100",
  "orderTrackingStatus": 0,
  "orderStatus": 0,
  "orderDate":"2022-01-01T00:00:00.000Z",
  "orderProducts": [
    {
      "product": {
        "id": 1,
        "name": "product1",
        "description": "desc1",
        "price": 10,
        "image": "image1",
        "category": "category1",
      },
      "quantity": 2
    },
    {
      "product": {
        "id": 1,
        "name": "product1",
        "description": "desc1",
        "price": 10,
        "image": "image1",
        "category": "category1",
      },
      "quantity": 2
    }
  ],

}



*/
