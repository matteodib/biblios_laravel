<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function libri() {
        return $this->belongsToMany(Book::class, 'authors_books', 'autore_id', 'libro_id');
    }
}
