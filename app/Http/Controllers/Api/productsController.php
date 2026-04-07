<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\productsResource;
use App\Models\product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function get_product($id)
    {
        $data = product::find($id);


        return response()->json($data);
    }
    public function product_info(Request $request)
    {

       // $prod_id = product::find();


        $data = product::find($request->query('prod_id'));
        if (!$data) {
            return response()->json([
                'status' => 'fail',
                'message' => 'المنتج غير موجود'
            ], 404);
        }


       return new productsResource($data);

    }
    public function get_all_products()
    {
        $data = product::where('active', 1)
            ->orderByDesc('come_first') // المنتجات اللي comeFirst = 1 تأتي أولاً
            ->get();


        return  productsResource::collection($data);
    }

    public function create_product(Request $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $request->photo->storeAs('products', rand() . '.jpg', 'my_public'),
            'section_id' => $request->section,
            'active' => $request->stock ?? true,
            'qnt' => $request->stockQnt,
        ];

        product::create($data);

        return  response()->json(['message' => 'product created successfully']);
    }


    public function get_best_sellers()
    {
        $data =  product::where('best_saller', '=', 1)->get();

        return  productsResource::collection($data);
    }


    public function get_offer_rate()
    {
        $data =  product::where('offer_rate', '>', 0)->orderBy('offer_rate', 'desc')->get();

        if (!isset($data[0])) {
            return  response()->json([
                'data' => [],
                'message' => 'not found'
            ], 200);
        } else {

            return  productsResource::collection($data);
        }
    }


    public function products_search(Request $request)
    {

        // dd($request->query('type'));

        switch ($request->query('type')) {
            case '1':
                $data =  product::where('bar_code', 'LIKE', "%{$request->query('search_value')}%")
                ->where('active', 1)
                ->get();
                break;
            case '2':
                $data =  product::where('name', 'LIKE', "%{$request->query('search_value')}%")->where('active', 1)->get();
                break;
            default:
                $data =  [];
                break;
        }


        if (!isset($data[0])) {
            return  response()->json([
                'data' => $data,
                'code' => 200,
                'message' => 'not found '
            ], 200);
        } else {

            return  productsResource::collection($data);
        }
    }
}
