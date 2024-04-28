<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "John Doe",
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => "Krit Verma",
            'username' => 'krit_verma',
            'email' => 'kritverma2002@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => "Real User",
            'username' => 'real_user',
            'email' => 'real_user@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
