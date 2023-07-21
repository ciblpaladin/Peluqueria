<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campus>
 */
class CampusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "nombre_sede"  => fake()->name(),
            "direccion_sede" => fake()->address(),
            "ciudad_fk" => fake()->numberBetween(1, 50)
            
        ];

    }
}
