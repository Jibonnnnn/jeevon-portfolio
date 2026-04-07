<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Jeevon Admin',
            'email'    => 'jeevon@example.com',
            'password' => Hash::make('demo1234'), // Use a secure password in production
        ]);
    }
}