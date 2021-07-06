<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function argomento() {
        return $this->belongsTo(Argument::class);
    }
    public function editore() {
        return $this->belongsTo(Publisher::class);
    }
    public function autori() {
        return $this->belongsToMany(Author::class, 'authors_books', 'libro_id', 'autore_id');
    }
    public function prestiti() {
        return $this->belongsToMany(User::class, 'book_user');
    }
}
