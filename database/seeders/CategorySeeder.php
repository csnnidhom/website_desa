<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Karang Taruna',
            ],
            [
                'name' => 'Remaja Masjid',
            ],
            [
                'name' => 'ASM Putra',
            ]
        ];

        Category::insert($category);
    }
}
