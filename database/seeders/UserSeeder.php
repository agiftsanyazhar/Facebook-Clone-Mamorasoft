<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 100 users
        for ($i = 1; $i <= 100; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@gmail.com",
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
