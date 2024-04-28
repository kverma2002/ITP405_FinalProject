<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'user_id' => 1, // Assuming there's at least one user with ID 1
                'title' => 'Looking for book recommendations',
                'content' => 'Can anyone recommend books similar to "Pride and Prejudice"?',
                'book_id' => 1, // Optional link to a book ID
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'title' => 'Discussion: The impact of classical literature',
                'content' => 'How do you think classical literature has shaped modern writing?',
                'book_id' => NULL, // Optional link to a book ID
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
