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
                'cover_image' => 'storage/cover_images/pride_and_prejudice.jpg',
                'author_id' => 1,
                'published_date' => '1813-01-28',
                'genre_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sense and Sensibility',
                'isbn' => '1234567890124',
                'summary' => 'A story of two sisters with contrasting temperaments.',
                'cover_image' => 'storage/cover_images/sense_and_sensibility.jpg',
                'author_id' => 1,
                'published_date' => '1811-10-30',
                'genre_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Books for Charles Dickens
        DB::table('books')->insert([
            [
                'title' => 'Great Expectations',
                'isbn' => '2234567890123',
                'summary' => 'A coming-of-age novel of an orphan nicknamed Pip.',
                'cover_image' => 'storage/cover_images/great_expectations.jpg',
                'author_id' => 2,
                'published_date' => '1861-12-01',
                'genre_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'A Tale of Two Cities',
                'isbn' => '2234567890124',
                'summary' => 'Set in London and Paris before and during the French Revolution.',
                'cover_image' => 'storage/cover_images/A Tale of Two Cities.jpg',
                'author_id' => 2,
                'published_date' => '1859-04-30',
                'genre_id' => 4,
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
                'cover_image' => 'storage/cover_images/The Adventures of Tom Sawyer.jpg',
                'author_id' => 3,
                'published_date' => '1876-12-10',
                'genre_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Adventures of Huckleberry Finn',
                'isbn' => '3234567890124',
                'summary' => 'Direct sequel to "The Adventures of Tom Sawyer".',
                'cover_image' => 'storage/cover_images/Adventures of Huckleberry Finn.jpg',
                'author_id' => 3,
                'published_date' => '1884-12-10',
                'genre_id' => 3,
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
                'cover_image' => 'storage/cover_images/Mrs Dalloway.jpg',
                'author_id' => 4,
                'published_date' => '1925-05-14',
                'genre_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'To the Lighthouse',
                'isbn' => '4234567890124',
                'summary' => 'The Ramsay family and their visits to the Isle of Skye in Scotland between 1910 and 1920.',
                'cover_image' => 'storage/cover_images/To the Lighthouse.jpg',
                'author_id' => 4,
                'published_date' => '1927-05-05',
                'genre_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Books for Real Author
        DB::table('books')->insert([
            [
                'title' => 'Real Book',
                'isbn' => '12345678910',
                'summary' => 'This very real book is very good',
                'cover_image' => 'storage/cover_images/book-cover-placeholder.png',
                'author_id' => 5,
                'published_date' => '2023-01-01',
                'genre_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Fake Book',
                'isbn' => '10987654321',
                'summary' => 'This fake book is unfortunately bad',
                'cover_image' => 'storage/cover_images/book-cover-placeholder.png',
                'author_id' => 5,
                'published_date' => '2022-12-31',
                'genre_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Very Fake Book',
                'isbn' => '10987654321',
                'summary' => 'This very fake book is unfortunately very bad',
                'cover_image' => 'storage/cover_images/book-cover-placeholder.png',
                'author_id' => 5,
                'published_date' => '2022-12-30',
                'genre_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
