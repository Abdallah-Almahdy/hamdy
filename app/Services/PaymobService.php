<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymobService
{
    protected $apiKey;
    protected $integrationId;
    protected $secretKey;

    public function __construct()
    {
        $this->apiKey = env('PAYMOB_API_KEY');
        $this->integrationId = env('PAYMOB_INTEGRATION_ID');
        $this->secretKey = env('PAYMOB_SECRET_KEY');
    }

    public function createOrder($amount)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.paymob.com/v1/orders', [
            'amount_cents' => $amount * 100,
            'currency' => 'EGP',
            'integration_id' => $this->integrationId,
            'delivery_needed' => false,
        ]);

        return $response->json();
    }

    public function createPaymentKey($orderId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.paymob.com/v1/payments', [
            'order_id' => $orderId,
            'amount_cents' => 1000,
            'currency' => 'EGP',
            'integration_id' => $this->integrationId,
        ]);

        return $response->json();
    }
}
