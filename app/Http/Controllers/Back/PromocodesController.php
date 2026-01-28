<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Http\Request;

class PromocodesController extends Controller
{
    public function index()
    {


        $data = PromoCode::all();
        return view('pages.promocodes.index', ['data' => $data]);
    }

    public function create()
    {

        $users = User::all();

        // Loop through users and add the 'conc_name' attribute with no commas in the name
        $users = $users->map(function ($user) {
            // Replace commas with spaces (or any other character you want)
            $user->conc_name = str_replace(',', ' ', $user->name);
            return $user;
        });
        return view('pages.promocodes.create', ['users' => $users]);
    }

    public function edit($id)
    {
        $old = PromoCode::find($id);
        return view('pages.promocodes.edit', ['id' => $id, 'old' => $old]);
    }
    public function update(Request $request, PromoCode  $PromoCode, $id)
    {
        $updated = [];
        if ($request->active == 1) {
            $updated['active'] = 1;
        }
        if ($request->active == 0) {
            $updated['active'] = 0;
        }
        if ($request->expiry_date) {
            $updated['expiry_date'] = $request->expiry_date;
        }

        PromoCode::find($id)->update($updated);
        return redirect()->route('promocodes.index')->with('success', 'Promo code updated successfully');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:promo_codes',
            'expiry_date' => 'nullable|date',
            'discount_type' => 'required|in:percentage,cash',
            'promo_cat' => 'required|in:user,all',
            'min_order_value' => 'nullable|integer|min:0',
            'check_offer_rate' => 'nullable|integer',
        ]);


        // dd($validated);
        if ($request->discount_type == 'cash') {
            $validated['discount_percentage_value'] = null;
            $request->validate(['discount_cash_value' => 'required_if:discount_type,cash|numeric|min:0']);
            $validated['discount_cash_value'] = $request->discount_cash_value;
        }
        if ($request->discount_type == 'percentage') {
            $validated['discount_cash_value'] = null;
            $request->validate(['discount_percentage_value' => 'required_if:discount_type,percentage|integer|min:1|max:100']);
            $validated['discount_percentage_value'] = $request->discount_percentage_value;
        }

        $validated['users_limit'] = $request->users_limit;
        $validated['available_codes'] = $validated['users_limit'];

        if ($request->promo_cat == 'user') {
            $validated['users_limit'] = 1;
            $validated['available_codes'] = 1;
            $validated['type'] = 'limited';
        }
        if ($request->promo_cat == 'all') {
            $request->validate([
                'type' => 'required'
            ]);
            $validated['type'] = $request->type;

            if ($request->type == 'limited') {
                $request->validate([
                    'users_limit' => 'required'
                ]);
            }
        }


        $validated['active'] = 1;
        if ($request->user_id) {
            $validated['user_id'] = $request->user_id;
        }

        PromoCode::create($validated);

        return redirect()->route('promocodes.index')->with('success', 'تم إضافة الكود الترويجي بنجاح');
    }
}
