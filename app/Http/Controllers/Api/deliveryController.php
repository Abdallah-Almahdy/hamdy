<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\deliveryRecourse;
use App\Models\customer_info;
use App\Models\customerUser;
use App\Models\delivery;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class deliveryController extends Controller
{
    public function get_all_delivery_places()
    {


        $data = delivery::all();
        if ($data) {

            return response()->json([
                'data' =>  deliveryRecourse::collection($data),
                'message' => 'fetched successfully ',
                'code' => '200'
            ], 200);
        } else {
            return response()->json([

                'message' => 'couldn\'t find any records',
                'code' => '404'
            ], 404);
        }
    }
    public function get_delivery_price_by_userID(Request $request)
    {
        $checkUserExist = User::find($request->query('user_id'));


        if ($checkUserExist) {
            $customer_info = customer_info::where('user_id', $request->query('user_id'))->get()[0];

          $is_free = delivery::find($customer_info->addressCountry + 0)->is_free;
            if ($is_free) {
                return response()->json([
                    'data' =>   ['delivery_price' => 0],
                    'message' => 'fetched successfully ',
                    'code' => '200'
                ], 200);
            }
            if ($request->query('address_no') == 1) {


                if ($customer_info->addressCountry + 0  > 0) {

                    $delivery_price = delivery::find($customer_info->addressCountry + 0);

                    if ($delivery_price) {
                        $delivery_price = delivery::find($customer_info->addressCountry + 0)->delivery_price;

                        return response()->json([
                            'data' =>   ['delivery_price' => $delivery_price],
                            'message' => 'fetched successfully ',
                            'code' => '200'
                        ], 200);
                    } else {
                        return response()->json([

                            'message' => 'this id dosnt refer to any delivery place',
                            'code' => '404'
                        ], 404);
                    }
                } else {
                    return response()->json([

                        'message' => 'this id refers to a non integer value in the customer info table',
                        'code' => '404'
                    ], 404);
                }
            } elseif ($request->query('address_no') == 2) {

                if ($customer_info->addressCountry2 + 0  > 0) {

                    $delivery_price = delivery::find($customer_info->addressCountry2 + 0);

                    if ($delivery_price) {
                        $delivery_price = delivery::find($customer_info->addressCountry2 + 0)->delivery_price;

                        return response()->json([
                            'data' =>   ['delivery_price' => $delivery_price],
                            'message' => 'fetched successfully ',
                            'code' => '200'
                        ], 200);
                    } else {
                        return response()->json([

                            'message' => 'this id dosnt refer to any delivery place',
                            'code' => '404'
                        ], 404);
                    }
                } else {
                    return response()->json([

                        'message' => 'this id refers to a non integer value in the customer info table',
                        'code' => '404'
                    ], 404);
                }
            }
        } else {
            return response()->json([

                'message' => 'couldn\'t find any records',
                'code' => '404'
            ], 404);
        }
    }
}
