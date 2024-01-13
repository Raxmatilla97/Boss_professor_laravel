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
            'name' => 'Wi-Fi XOR',
            'email' => 'wi.fi.xor@gmail.com',           
            'password' => bcrypt('5579187Er'),
        ]);
    }
}
