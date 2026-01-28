<?php

namespace App\Http\Controllers;

use App\Services\PaymobService;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaymobPayment;

class PaymentController extends Controller
{
    // protected $paymobService;

    // public function __construct(PaymobService $paymobService)
    // {
    //     $this->paymobService = $paymobService;
    // }

    // public function showPaymentForm()
    // {
    //     return view('payment.payment');
    // }

    // public function processPayment(Request $request)
    // {
    //     $amount = $request->input('amount');
    //     $order = $this->paymobService->createOrder($amount);

    //     if ($order['status'] === 'success') {
    //         $paymentKey = $this->paymobService->createPaymentKey($order['id']);
    //         return view('payment.payment-success', ['paymentKey' => $paymentKey['id']]);
    //     } else {
    //         return back()->with('error', 'Payment creation failed.');
    //     }
    // }


    public function payWithPaymob(Request $request)
    {
        $payment = new PaymobPayment();
        $response = $payment
            ->setUserFirstName("ammar")
            ->setUserLastName("ammar")
            ->setUserEmail("ammar@gmail.com")
            ->setUserPhone("010056438")
            ->setAmount("800")
            ->pay();


        dd($response);
        //output
        //[
        //    'payment_id'=>"", // refrence code that should stored in your orders table
        //    'redirect_url'=>"", // redirect url available for some payment gateways
        //    'html'=>"" // rendered html available for some payment gateways
        //]

    }

    public function verifyWithPaymob(Request $request)
    {
        $payment = new PaymobPayment();
        $response = $payment->verify($request);


        dd($response);
        //output
        //[
        //    'success'=>true,//or false
        //    'payment_id'=>"PID",
        //    'message'=>"Done Successfully",//message for client
        //    'process_data'=>""//payment response
        //]
    }
}
