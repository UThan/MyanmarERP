<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => array_rand(['male','female']),
            'email' => $this->faker->safeEmail(),
            'phone_no' => $this->faker->phoneNumber(),
            'member_status_id' => 1,
        ];
    }
}
