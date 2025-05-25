<?php

namespace App\Http\Controllers;

use App\Models\PickupRequest;
use Illuminate\Http\Request;

class AdminPickupRequestController extends Controller
{
    public function index()
    {
        $requests = PickupRequest::with('user')->latest()->get();
        return view('admin.pickup_requests.index', compact('requests'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $pickup = PickupRequest::findOrFail($id);
        $pickup->status = $request->status;
        $pickup->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
