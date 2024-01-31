<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Demo 
        DB::table('professors')->insert([
            'id' => 1,
            'fish' => 'Xodjamqulov Umid Negmatovich', // Bu yerda sizning 'fish' ustuniga teng bo'lgan nom
            'image' => '3U9A6035.jpg', // 'image' ustuni uchun demo tasvir
            'status' => '1', // 'status' ustuni uchun qiymat
            'custom_ball' => 0, // 'custom_ball' uchun o'zgaruvchi turi float bo'lishi mumkin
            'small_info' => "Pedagogik ta’lim innovatsion klasterining ilmiy-nazariy asoslari va amaliy mexanizmlari", // 'small_info' ustuni uchun qisqacha ma'lumot
            'slug_number' => Str::random(10), // 'slug_number' uchun random string, Laravel Str::random funksiyasi orqali
        ]
        );

        DB::table('professors')->insert([
            'id' => 2,
            'fish' => 'Qodirova Feruzaxon Usmanovna', // Bu yerda sizning 'fish' ustuniga teng bo'lgan nom
            'image' => '1702332756.jpg', // 'image' ustuni uchun demo tasvir
            'status' => '1', // 'status' ustuni uchun qiymat
            'custom_ball' => 0, // 'custom_ball' uchun o'zgaruvchi turi float bo'lishi mumkin
            'small_info' => "Uzluksiz inklyuziv ta’lim klasterining pedagogik-psixologik asoslari”ni tadqiq etish", // 'small_info' ustuni uchun qisqacha ma'lumot
            'slug_number' => Str::random(10), // 'slug_number' uchun random string, Laravel Str::random funksiyasi orqali
        ]
        );
    }

   
}
