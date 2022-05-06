<?php

namespace Database\Seeders;

use App\Models\Pesan;
use Illuminate\Database\Seeder;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesan::truncate();
        Pesan::create([
            'name' => 'Nidhom',
            'email' => 'nidhom@gmail.com',
            'perihal' => 'kritik fasilitas umum',
            'pesan' => 'untuk jalan di rt 02 tolong diperbaiki'
        ]);
    }
}
