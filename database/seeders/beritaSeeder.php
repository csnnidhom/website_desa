<?php

namespace Database\Seeders;

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
            'title' => 'dari seeder',
            'content' => 'dari seeder',
            'id_category' => '1'
        ];
        DB::table('berita')->insert($berita);
    }
}
