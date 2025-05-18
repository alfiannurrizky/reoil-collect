<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'company_address', 'value' => 'Jl. Medan Merdeka Utara No.1, Jakarta'],
            ['key' => 'company_latitude', 'value' => '-6.343951'],
            ['key' => 'company_longitude', 'value' => '106.739818'],
            ['key' => 'site_description', 'value' => 'Kami mengumpulkan dan mendaur ulang oli bekas dengan cara yang bertanggung jawab terhadap lingkungan. Bergabunglah dengan kami dalam menjaga bumi yang lebih bersih.'],
            ['key' => 'company_phone', 'value' => '6285711872311'],
            ['key' => 'company_name', 'value' => 'Reoil Collect'],
            ['key' => 'company_email', 'value' => 'info@reoilcollect.com'],
            ['key' => 'location_guide', 'value' => 'Dekat dengan Monas'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
