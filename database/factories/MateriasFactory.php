<?php

namespace Database\Factories;

use App\Models\maestro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materias>
 */
class MateriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'nombre'=>$this->faker->randomElement(['Algebra', 'Logica de Programación', 'Organización y Sistemas', 'Ingles', 'Literatura', 'Habilidades de Investigación', 'Educación Fisica', 'Programación']),
            'uni_credito'=>$this->faker->randomNumber(1, 3),
            'id_maestro'=> maestro::inRandomOrder()->first()->id,
        ];
    }
}
