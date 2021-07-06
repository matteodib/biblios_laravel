<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestito extends Model
{
    use HasFactory;
    protected $table = 'book_user';
    public $timestamps = false;

    public function libro() {
        return $this->belongsToMany(Book::class);
    }
    public function utente() {
        return $this->belongsToMany(User::class);
    }
}
