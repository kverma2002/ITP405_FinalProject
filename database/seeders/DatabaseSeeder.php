<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AuthorsTableSeeder::class,
            BooksTableSeeder::class,
            ReviewsTableSeeder::class,
            BookAuthorsTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class
        ]);
    }
}
