<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickupRequest;
use Illuminate\Support\Facades\Auth;

class PickupRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = PickupRequest::where('user_id', Auth::id())->get();
        return view('owner.index', compact('requests'));
    }

    // Tampilkan form buat pickup
    public function create()
    {
        return view('owner.create');
    }

    // Simpan pickup request
    public function store(Request $request)
    {
        $request->validate([
            'requested_date' => 'required|date|after_or_equal:today',
            'notes' => 'nullable|string',
        ]);

        PickupRequest::create([
            'user_id' => Auth::id(),
            'requested_date' => $request->requested_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('pickup-requests.index')->with('success', 'Permintaan jemput berhasil dikirim.');
    }
}
