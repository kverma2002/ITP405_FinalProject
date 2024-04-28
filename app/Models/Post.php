<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relationship with Book (optional)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relationship with Comment
    public function comments()
    {
        return $this->hasMany(Comment::class, 'posts_id');
    }
}
