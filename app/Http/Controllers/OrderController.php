<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('product', 'user')->latest()->get();
        return view('admin.pesanan.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $user = auth()->user();

        if ($validated['quantity'] > $product->stock) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        $totalPrice = $product->price * $validated['quantity'];

        Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pesanan berhasil dikirim dan menunggu konfirmasi admin.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $pickup = Order::findOrFail($id);
        $pickup->status = $request->status;
        $pickup->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
