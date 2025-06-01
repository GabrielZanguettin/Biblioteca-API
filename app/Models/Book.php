<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'synopsis', 'gender_id', 'author_id'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
