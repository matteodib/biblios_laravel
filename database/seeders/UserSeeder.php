<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
           'name' => 'Matteo Di Blasio',
            'email' => 'matteodibs@gmail.com',
            'password' => Hash::make('dbstefano1'),
            'cellulare' => '3345430575'
        ]);
        User::insert([
            'name' => 'Gianni Rossi',
            'email' => 'giannirossi@gmail.com',
            'password' => Hash::make('dbstefano1'),
            'cellulare' => '3335430565'
        ]);
    }
}
