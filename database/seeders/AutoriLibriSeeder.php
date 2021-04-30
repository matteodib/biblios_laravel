<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class AutoriLibriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libro = Book::find(1);
        $libro->autori()->attach(1);
    }
}
