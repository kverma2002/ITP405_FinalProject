<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Relationship with Book (optional)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relationship with Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
