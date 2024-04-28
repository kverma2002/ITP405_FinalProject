<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {     
        $book_authors = [
            ['book_id' => 1, 'author_id' => 1], // Pride and Prejudice by Jane Austen
            ['book_id' => 2, 'author_id' => 1], // Sense and Sensibility by Jane Austen // TEST TWO AUTHORS ONE BOOK
            ['book_id' => 2, 'author_id' => 5], // Sense and Sensibility by Real Author // TEST TWO AUTHORS ONE BOOK
            ['book_id' => 3, 'author_id' => 2], // Great Expectations by Charles Dickens
            ['book_id' => 4, 'author_id' => 2], // A Tale of Two Cities by Charles Dickens
            ['book_id' => 5, 'author_id' => 3], // The Adventures of Tom Sawyer by Mark Twain
            ['book_id' => 6, 'author_id' => 3], // Adventures of Huckleberry Finn by Mark Twain
            ['book_id' => 6, 'author_id' => 5], // Adventures of Huckleberry Finn by Real Author
            ['book_id' => 7, 'author_id' => 4], // Mrs Dalloway by Virginia Woolf
            ['book_id' => 8, 'author_id' => 4]  // To the Lighthouse by Virginia Woolf
        ];

        DB::table('book_authors')->insert($book_authors);
    }
}
