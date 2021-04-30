<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->count(1)->create();
    }
}
