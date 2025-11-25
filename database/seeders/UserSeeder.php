<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin ePuskesmas',
            'email' => 'admin@epuskesmas.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
