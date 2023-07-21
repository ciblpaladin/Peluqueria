<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre_cliente"  => fake()->firstName(),
            "apellido_cliente" => fake()->lastName(),
            "cedula_cliente" => fake()->numberBetween(10000,30000),
            "celular_cliente" => fake()->numberBetween(10000,30000),
            "correo_cliente" => fake()->email(),
            "password_cliente" => fake()->password(),
            "ciudad_fk" => fake()->numberBetween(1,99),
            "delete_soft" => 1
        ];
    }

    protected $fillable= 
    ["nombre_cliente",
    "apellidos_cliente",
    "cedula_cliente",
    "celular_cliente",
    "correo_cliente",
    "password_cliente",
    "delete_soft"];
}
