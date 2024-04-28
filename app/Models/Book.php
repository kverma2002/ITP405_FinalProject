<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'published_date' => 'date',
    ];
    
    // Relationship with Author
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    // Relationship with Post (if a book can be associated with posts)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
