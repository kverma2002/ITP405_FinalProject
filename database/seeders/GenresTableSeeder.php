<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Romance'],
            ['name' => 'Fiction'],
            ['name' => 'Adventure'],
            ['name' => 'Historical Fiction'],
            ['name' => 'Modernist Literature'],
            ['name' => 'Non-fiction'],
            ['name' => 'Comedy'],
            ['name' => 'Comic'],
            ['name' => 'Finance'],
            ['name' => 'Biography'],
        ]);
    }
}
