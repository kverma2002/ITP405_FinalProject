<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Books for Jane Austen
        DB::table('books')->insert([
            [
                'title' => 'Pride and Prejudice',
                'isbn' => '1234567890123',
                'summary' => 'A romantic novel of manners.',
                // 'cover_image' => '/images/pride_and_prejudice.jpg',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Sense and Sensibility',
                'isbn' => '1234567890124',
                'summary' => 'A story of two sisters with contrasting temperaments.',
                // 'cover_image' => '/images/sense_and_sensibility.jpg',
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Books for Charles Dickens
        DB::table('books')->insert([
            [
                'title' => 'Great Expectations',
                'isbn' => '2234567890123',
                'summary' => 'A coming-of-age novel of an orphan nicknamed Pip.',
                // 'cover_image' => '/images/great_expectations.jpg',
                'author_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'A Tale of Two Cities',
                'isbn' => '2234567890124',
                'summary' => 'Set in London and Paris before and during the French Revolution.',
                // 'cover_image' => '/images/a_tale_of_two_cities.jpg',
                'author_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Books for Mark Twain
        DB::table('books')->insert([
            [
                'title' => 'The Adventures of Tom Sawyer',
                'isbn' => '3234567890123',
                'summary' => 'A tale of young boys growing up along the Mississippi River.',
                // 'cover_image' => '/images/the_adventures_of_tom_sawyer.jpg',
                'author_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Adventures of Huckleberry Finn',
                'isbn' => '3234567890124',
                'summary' => 'Direct sequel to "The Adventures of Tom Sawyer".',
                // 'cover_image' => '/images/adventures_of_huckleberry_finn.jpg',
                'author_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Books for Virginia Woolf
        DB::table('books')->insert([
            [
                'title' => 'Mrs Dalloway',
                'isbn' => '4234567890123',
                'summary' => 'Details a day in the life of Clarissa Dalloway in post-World War I England.',
                // 'cover_image' => '/images/mrs_dalloway.jpg',
                'author_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'To the Lighthouse',
                'isbn' => '4234567890124',
                'summary' => 'The Ramsay family and their visits to the Isle of Skye in Scotland between 1910 and 1920.',
                // 'cover_image' => '/images/to_the_lighthouse.jpg',
                'author_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
