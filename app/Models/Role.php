<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    public function utenti() {
        $this->belongsToMany(User::class, 'role_users', 'ruolo_id', 'user_id');
    }
}
