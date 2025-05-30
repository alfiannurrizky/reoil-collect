<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Ambil data JSON dari Midtrans
        $payload = $request->getContent();
        $notification = json_decode($payload);

        // Log biar bisa dicek nanti (opsional)
        Log::info('Midtrans webhook received:', (array) $notification);

        // Ambil order berdasarkan ID dari Midtrans (biasanya order_id = id dari tabel)
        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;

        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update payment_status berdasarkan status dari Midtrans
        $order->payment_status = $transactionStatus;

        // update status internal:
        if ($transactionStatus === 'capture') {
            $order->status = 'accepted';
        } elseif ($transactionStatus === 'expire') {
            $order->status = 'rejected';
        }

        $order->save();

        return response()->json(['message' => 'Webhook processed successfully']);
    }
}
