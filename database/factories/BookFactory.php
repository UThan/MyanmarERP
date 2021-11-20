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
            'book_no' => $this->faker->numberBetween(1, 20),
            'title' => $this->faker->name(),
            'copies_owned' => $this->faker->numberBetween(1, 100),
            'copies_left' => $this->faker->numberBetween(1, 100),
            'copies_lost' => $this->faker->numberBetween(1, 100),
            'pages' => $this->faker->numberBetween(1, 100),
        ];
    }
}
