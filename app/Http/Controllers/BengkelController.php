<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    // Tampilkan semua data bengkel
    public function index()
    {
        $bengkels = Bengkel::all();
        return view('bengkels.index', compact('bengkels'));
    }

    // Tampilkan form tambah bengkel
    public function create()
    {
        return view('bengkels.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Bengkel::create($validated);

        return redirect()->route('bengkels.index')->with('success', 'Data bengkel berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Bengkel $bengkel)
    {
        return view('bengkels.edit', compact('bengkel'));
    }

    // Update data
    public function update(Request $request, Bengkel $bengkel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $bengkel->update($validated);

        return redirect()->route('bengkels.index')->with('success', 'Data bengkel berhasil diupdate.');
    }

    public function show($id)
    {
        $bengkel = Bengkel::findOrFail($id);
        return view('bengkels.detail', compact('bengkel'));
    }

    // Hapus data
    public function destroy(Bengkel $bengkel)
    {
        $bengkel->delete();
        return redirect()->route('bengkels.index')->with('success', 'Data bengkel berhasil dihapus.');
    }
}
