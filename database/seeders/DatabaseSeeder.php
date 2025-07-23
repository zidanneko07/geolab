<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder 10 akun client dengan password user123
        for ($i = 1; $i <= 10; $i++) {
            $email = 'user' . $i . '@example.com';
            $user = \App\Models\User::create([
                'email' => $email,
                'role' => 'client',
                'status' => 'aktif',
                'password' => bcrypt('user123'),
            ]);
            echo "Email: $email | Password: user123 | Role: client\n";
        }

        // Seeder 10 akun client dengan password client123
        for ($i = 1; $i <= 10; $i++) {
            $email = "client{$i}@perusahaan.com";
            $user = \App\Models\User::create([
                'email' => $email,
                'role' => 'client',
                'status' => 'aktif',
                'password' => bcrypt('client123'),
            ]);
            echo "Email: $email | Password: client123 | Role: client\n";
        }

        // Seeder 5 akun admin
        for ($i = 1; $i <= 5; $i++) {
            $email = "admin{$i}@geolab.com";
            $user = \App\Models\User::create([
                'email' => $email,
                'role' => 'admin',
                'status' => 'aktif',
                'password' => bcrypt('admin123'),
            ]);
            echo "Email: $email | Password: admin123 | Role: admin\n";
        }

        // Seeder 5 akun operator
        for ($i = 1; $i <= 5; $i++) {
            $email = "operator{$i}@geolab.com";
            $user = \App\Models\User::create([
                'email' => $email,
                'role' => 'operator',
                'status' => 'aktif',
                'password' => bcrypt('operator123'),
            ]);
            echo "Email: $email | Password: operator123 | Role: operator\n";
        }

        // User khusus ahmad.rizki
        \App\Models\User::create([
            'email' => 'ahmad.rizki@geolab.com',
            'role' => 'client',
            'status' => 'aktif',
            'password' => bcrypt('ahmad123'),
        ]);
        echo "Email: ahmad.rizki@geolab.com | Password: ahmad123 | Role: client\n";

        $this->call(AdminSeeder::class);
    }
}
