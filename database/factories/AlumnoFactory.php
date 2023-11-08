<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'apellido'=>$this->faker->lastName(),
            'telefono'=>$this->faker->phoneNumber(),
            'direccion'=>$this->faker->address(),
            'correo'=>$this->faker->safeEmail(),
        ];
    }
}