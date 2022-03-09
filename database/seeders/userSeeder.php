<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'dhom',
            'email' => 'dhom@gmail.com',
            'password' => bcrypt('dhom'),
            'remember_token' => Str::random(60),
        ]);
    }
}
