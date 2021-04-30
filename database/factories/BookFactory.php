<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titolo' => 'Zanna Bianca',
            'anno_pubb' => '1998',
            'isbn' => '12345',
            'trama' => $this->faker->sentence(),
            'copertina' => '1.jpg',
            'copie' => '12',
            'argomento_id' => '1',
            'editore_id' => '1'
        ];
    }
}
