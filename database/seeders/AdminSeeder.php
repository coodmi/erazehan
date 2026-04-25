<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@erazehan.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@erazehan.com',
                'password' => Hash::make('Admin@1234'),
            ]
        );
    }
}
