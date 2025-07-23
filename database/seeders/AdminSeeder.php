<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'email' => "admin{$i}@geolab.com",
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'aktif',
            ]);
        }
    }
} 