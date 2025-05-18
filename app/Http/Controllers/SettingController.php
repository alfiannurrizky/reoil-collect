<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key');
        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->only(['company_name', 'company_address', 'company_email', 'company_phone', 'company_latitude', 'company_longitude', 'visi', 'site_description', 'location_guide']);

        foreach ($data as $key => $value) {
            Setting::setValue($key, $value);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
