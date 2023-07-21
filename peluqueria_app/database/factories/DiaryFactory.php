<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "empleado_fk"  => fake()->numberBetween(1,45),
            "cliente_fk" => fake()->numberBetween(10,90),
            "servicio_fk" => fake()->numberBetween(1,45),
            "sede_fk" => fake()->numberBetween(1,45),
            "fecha_agenda" => fake()->date(),
            "hora_agenda" => fake()->time(),
            "delete_soft" => 1
        ];
    }



}
