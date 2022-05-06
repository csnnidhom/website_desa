<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'name' => 'Nidhom',
            'jabatan' => 'Ketua',
            'bio' => 'semoa karang taruna sememi kidul semakin maju',
            'image' => 'ini gambar',
            'id_category' => 2,
        ]);
    }
}
