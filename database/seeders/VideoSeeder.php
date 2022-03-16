<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();
        Video::create([
            'title' => 'ini title Video',
            'video' => 'ini video',
            'id_category' => '1'
        ]);
    }
}
