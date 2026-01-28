<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\contactUs;
use App\Models\resons;
use App\Models\User;
use Illuminate\Http\Request;

class contactUsController extends Controller
{
    public function contact_us(Request $request)
    {




        $item = contactUs::create($request->all());

        if ($item) {

            return response()->json([
                'data' => $item,
                'message' => 'done, added successfully',
                'code' => '200'
            ], 200);
        } else {

            return response()->json([
                'message' => 'faild, aleardy sent',
                'code' => '208'
            ], 208);
        }
    }
}
