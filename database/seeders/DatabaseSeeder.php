<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProfessorsSeeder::class);
        $this->call(ModeratorsSeeder::class);
        $this->call(OperatorsSeeder::class);

    }
}
