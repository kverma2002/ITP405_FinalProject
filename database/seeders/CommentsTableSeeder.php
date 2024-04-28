<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Main comments
        DB::table('comments')->insert([
            [
                'posts_id' => 1,
                'parent_id' => null, // Main comment has no parent
                'user_id' => 2, // Assuming a second user exists
                'content' => 'I highly recommend "Emma" by Jane Austen. It has similar themes.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'posts_id' => 2,
                'parent_id' => null,
                'user_id' => 3,
                'content' => 'Classical literature often introduces complex narratives that modern literature builds upon.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Nested comments
        DB::table('comments')->insert([
            [
                'posts_id' => 1,
                'parent_id' => 1, // This is a reply to the first comment
                'user_id' => 1,
                'content' => 'Thanks for the recommendation! I\'ll check out "Emma".',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'posts_id' => 2,
                'parent_id' => 2,
                'user_id' => 1,
                'content' => 'Absolutely, the depth in character development in classics is unparalleled.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
