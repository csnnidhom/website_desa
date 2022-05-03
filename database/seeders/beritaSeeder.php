<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita = [
            'image' => 'coba.png',
            'caption' => 'ini caption',
            'title' => 'dari seeder',
            'content' => 'dari seeder',
            'id_category' => '1'
        ];

        Berita::truncate();
        Berita::insert($berita);
    }
}
