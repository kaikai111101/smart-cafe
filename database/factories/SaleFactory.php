<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sale_date' => $this->faker->dateTimeBetween('-11 years'),
            'code' => $this->faker->numerify('TRX_#####################'),
            'customer_name' => $this->faker->name(),
        ];
    }
}
