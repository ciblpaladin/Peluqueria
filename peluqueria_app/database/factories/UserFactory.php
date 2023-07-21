<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre_usuario"  => fake()->firstName(),
            "apellidos_usuario" => fake()->lastName(),
            "cedula_usuario" => fake()->numberBetween(10000,30000),
            "celular_usuario" => fake()->numberBetween(10000,30000),
            "correo_usuario" => fake()->email(),
            "password_usuario" => fake()->password(),
            "rol_fk" => fake()->numberBetween(1,40),
            "status_fk" => fake()->numberBetween(1,40),
            "delete_soft" => 1
        ];
    }


}
