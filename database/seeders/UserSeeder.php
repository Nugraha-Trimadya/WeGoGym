<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            "name"=> "Admin",
            "email"=> "Admin@example.com",
            "password"=> bcrypt("admin123"),
            "role"=> "Admin",
        ]);

        User::create([
            "name"=> "User",
            "email"=> "User@example.com",
            "password"=> bcrypt("user123"),
            "role"=> "User",
        ]);

        User::create([
            "name"=> "Kasir1",
            "email"=> "kasir@example.com",
            "password"=> bcrypt("kasir123"),
            "role"=> "kasir",
        ]);

        User::create([
            "name"=> "Kasir2",
            "email"=> "kasir2@example.com",
            "password"=> bcrypt("kasir1234"),
            "role"=> "kasir",
        ]);
    }
}
