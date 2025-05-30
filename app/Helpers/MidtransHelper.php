<?php

namespace App\Helpers;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransHelper
{
    public static function config()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public static function createTransaction($order)
    {
        self::config();

        $params = [
            'transaction_details' => [
                'order_id' => $order->id . '-' . uniqid(),
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email ?? 'email@dummy.com',
            ],
            'item_details' => [
                [
                    'id' => $order->product->id,
                    'price' => $order->product->price,
                    'quantity' => $order->quantity,
                    'name' => $order->product->name,
                ],
            ],
        ];

        return Snap::getSnapToken($params);
    }
}
