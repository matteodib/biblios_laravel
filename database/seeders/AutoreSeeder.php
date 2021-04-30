<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AutoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::insert([
            'nome' => 'Matteo',
            'cognome' => 'Di Blasio',
            'sito_web' => 'iamaki.it'
        ]);
    }
}
