<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Availability>
 */
class AvailabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_fk" => fake()->numberBetween(1,45),
            "fecha_disponibilidad" => fake()->date(),
            "hora_inicio_disponibilidad" => fake()->time(),
            "hora_fin_disponibilidad"=> fake()->time(),
            "state_availability_fk" => fake()->numberBetween(1,45),
            "sede_fk" => fake()->numberBetween(1,45),
            "notas_disponibilidad" =>fake()->text(), 
        ];
    }
}
