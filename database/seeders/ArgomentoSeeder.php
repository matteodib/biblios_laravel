<?php

namespace Database\Seeders;

use App\Models\Argument;
use Illuminate\Database\Seeder;

class ArgomentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Argument::insert([
            'argomento' => 'Commedia'
        ]);
        Argument::insert([
            'argomento' => 'Orrore'
        ]);
    }
}
