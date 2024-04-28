<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $reviews = [
            ['book_id' => 1, 'user_id' => 1, 'rating' => 5, 'comment' => 'A fascinating exploration of social and class divisions.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 2, 'user_id' => 2, 'rating' => 4, 'comment' => 'An emotional journey through the lives of its characters.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 3, 'user_id' => 1, 'rating' => 5, 'comment' => 'Pip\'s adventures captured my imagination.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 4, 'user_id' => 3, 'rating' => 4, 'comment' => 'A gripping tale of chaos and duality.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 5, 'user_id' => 1, 'rating' => 5, 'comment' => 'Mark Twain\'s storytelling shines in this captivating novel.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 6, 'user_id' => 2, 'rating' => 4, 'comment' => 'A poignant and critical reflection on society.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 7, 'user_id' => 1, 'rating' => 5, 'comment' => 'Woolf\'s narrative technique is both innovative and captivating.', 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 8, 'user_id' => 3, 'rating' => 5, 'comment' => 'An introspective look at family and the passage of time.', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('reviews')->insert($reviews);
    }
}
