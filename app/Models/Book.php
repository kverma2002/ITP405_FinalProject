<?php

namespace App\Models;

use Auth;
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

    public function genre()
    {
        return $this->belongsTo(Genre::class);
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

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_books');
    }

    public function isFavorited()
    {
        return $this->favoredByUsers()->where('user_id', Auth::id())->exists();
    }

    public function wishedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_wishlist');
    }

    public function isWishedByUser()
    {
        return $this->wishedByUsers()->where('user_id', auth()->id())->exists();
    }

    public function readByUsers()
    {
        return $this->belongsToMany(User::class, 'read_books');
    }

    public function isReadByUser()
    {
        return $this->readByUsers()->where('user_id', auth()->id())->exists();
    }

}
