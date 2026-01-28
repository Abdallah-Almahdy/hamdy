<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\PromoCode;
use App\Models\PromoCodeUser;
use Illuminate\Http\Request;

class prompCodeController extends Controller
{
    public function check_promocode(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'promocode' => 'required',
            'user_id' => 'required',
            'order_total' => 'required'
        ]);

        // Get parameters
        $promoCode = $request->input('promocode');
        $userId = $request->input('user_id');
        $orderTotal = $request->input('order_total');
        $products = $request->input('products');

        // if exist
        $promoCodeCheck = PromoCode::where('active', true)
            ->where('expiry_date', '>', now())
            ->where('code', $promoCode) // Ensure you're checking the correct promo code
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
                if (product::find($product['id'])->offer_rate > 0) {
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
        $promo = PromoCode::where('code', $promoCode)
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

if($promoCodeCheck->available_codes != null){
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

        // Return valid promo code
        return response()->json([
            'status' => true,
            'data' =>  $promo,
            'message' => 'تم تطبيق الخصم'
        ], 200);
    }
}
