<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\productsResource;
use App\Models\favorites;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class favoritesController extends Controller
{
    public function  get_user_favorites(Request $request)
    {
        $items = favorites::where('user_id', $request->query('user_id'))->get();
        $data = [];
        foreach ($items as $item) {
            $data[] =  $item->product;
        }
        if (count($data)) {


            return productsResource::collection($data);
        } else {

            return response()->json([
                'data' => $data,
                'message' => 'faild, not found',
                'code' => '200'
            ], 200);
        }
    }

    public function  update_user_favorites(Request $request)
    {

        $user = User::find($request->query('user_id'));
        $product = product::find($request->query('product_id'));

        if ($user && $product) {

            $item = favorites::where('product_id', $request->query('product_id'))->where('user_id', $request->query('user_id'))->first();
            if ($item) {
                $item->delete();
                return response()->json([
                    'message' => 'done, deleted successfully',
                    'code' => '200'
                ], 200);
            } else {
                $item = new favorites();
                $item->user_id = $request->query('user_id');
                $item->product_id = $request->query('product_id');
                $item->save();
                return response()->json([
                    'message' => 'done, added successfully',
                    'code' => '200'
                ], 200);
            }
        }
    }


    public function  check_is_favorite(Request $request)
    {
        $item = favorites::where([
            'user_id' => $request->query('user_id'),
            'product_id' => $request->query('product_id')
        ])
            ->get();
        if (count($item)) {
            return response()->json([
                'data' => 'true',
                'message' => 'done, fetched successfully',
                'code' => '200'
            ], 200);
        } else {
            return response()->json([
                'message' => 'false',
                'message' => 'faild, not found',
                'code' => '404'
            ], 404);
        }
    }
}
