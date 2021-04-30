<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function libri() {
        return $this->hasMany(Book::class);
    }
    public function utenti() {
        return $this->hasMany(User::class);
    }
}
