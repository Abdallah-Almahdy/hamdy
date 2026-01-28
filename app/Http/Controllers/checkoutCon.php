<?php

namespace App\Http\Controllers;


class checkoutCon extends Controller
{
    public function index()
    {
        // $order = [[]'total' => 100, 'id' => 1];
        $PaymentKey = paymobfinalCon::pay(300, 1);
        return view('payment.paymob_iframe', ['token' => $PaymentKey]);
    }
}
