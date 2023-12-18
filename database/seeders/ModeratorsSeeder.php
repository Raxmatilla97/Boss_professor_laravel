<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModeratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moderators')->insert([
            [   
                'id' => 1,
                'moder_fish' => 'Toshtemirova Saodat Abdurashidovna ',
                'moder_image' => 'saodat.jpg',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Klaster yondashuvi asosida umumiy o‘rta ta’lim maktablarida ta’lim sifatini oshirish.",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            [   
                'id' => 2,
                'moder_fish' => "Koshanova Nilufar Maxsudovna",
                'moder_image' => 'nilufar.jpg',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Umumta’lim maktablarida sinf rahbarlari faoliyatini rivojlantirish",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            [   
                'id' => 3,
                'moder_fish' => "Maxmudov Qudratbek Shavkat o‘g‘li	",
                'moder_image' => 'qudratbek.jpg',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Ingliz tilini o‘qitishda madaniyatlararo muloqot kompetensiyasini shakllantirish metodikasini takomillashtirish (umumiy o‘rta ta’lim maktablarining 9-11-sinflari misolida)",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            [   
                'id' => 4,
                'moder_fish' => "Shukurllayev Jurabek Maksadbayevich",
                'moder_image' => 'jorabek.jpg',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Jismoniy tarbiya ta’limiga akmeologik yondashuv tatbiqi",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            [   
                'id' => 5,
                'moder_fish' => "Muxitdinova Maloxat Saidjabborovna.",
                'moder_image' => 'maloxat.png',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Pedagogik ta'lim klasteri asosida musiqa ta'limini metodik takomillashtirish.",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            [   
                'id' => 6,
                'moder_fish' => "Султонов Hайтбой Эралиевич",
                'moder_image' => '',
                'moder_status' => 1,
                'custom_ball' => 0,
                'moder_small_info' => "Кластер ёндашувига асосланган таълим интеграцияси",
                'moder_slug_number' => Str::random(10),
                'professor_id' => 1
            ],
            // Yana ma'lumotlar shu tariqada qo'shilishi mumkin...
        ]);
    }
}
