<?php

namespace Database\Factories;

use App\Models\RentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentStatusFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RentStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
