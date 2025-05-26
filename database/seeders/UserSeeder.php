<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@reoilcollect.com',
            'password' => Hash::make('NeverTouch!!'),
            'role' => "admin"
        ]);

        User::create([
            'name' => 'Owner Bengkel Restu',
            'email' => 'restubengkel@email.com',
            'password' => Hash::make('password123'),
            'role' => "bengkel"
        ]);
    }
}
