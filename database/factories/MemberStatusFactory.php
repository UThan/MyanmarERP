<?php

namespace Database\Factories;

use App\Models\MemberStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberStatus::class;

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
