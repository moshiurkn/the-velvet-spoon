<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create admin if they don't already exist
        if (!User::where('email', 'admin@velvetspoon.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@velvetspoon.com',
                'phone' => '0000000000',
                'address' => 'The Velvet Spoon HQ',
                'usertype' => 'admin',
                'password' => Hash::make('Admin@123'),
            ]);
        }
    }
}