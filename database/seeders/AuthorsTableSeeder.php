<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('authors')->insert([
            [
                'name' => 'Jane Austen',
                'biography' => 'Jane Austen was an English novelist known primarily for her six major novels...',
                // 'photo_url' => '/images/jane_austen.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Charles Dickens',
                'biography' => 'English writer and social critic. He created some of the world\'s best-known fictional characters and is regarded by many as the greatest novelist of the Victorian era.',
                // 'photo_url' => '/images/charles_dickens.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mark Twain',
                'biography' => 'American writer, humorist, entrepreneur, publisher, and lecturer, known for his wit and humor, as well as his novel "The Adventures of Tom Sawyer" and its sequel "Adventures of Huckleberry Finn".',
                // 'photo_url' => '/images/mark_twain.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Virginia Woolf',
                'biography' => 'English writer, considered one of the most important modernist 20th-century authors and also a pioneer in the use of stream of consciousness as a narrative device.',
                // 'photo_url' => '/images/virginia_woolf.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Real Author',
                'biography' => 'This real Author is definetly very real',
                // 'photo_url' => '/images/very_real.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
