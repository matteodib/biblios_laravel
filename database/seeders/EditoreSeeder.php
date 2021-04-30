<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class EditoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::insert([
            'nome' => 'Mondadori',
            'sito_web' => 'mondadori.it'
        ]);
    }
}
