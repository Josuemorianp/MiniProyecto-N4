<?php

namespace Database\Factories;

use App\Models\alumno;
use App\Models\curso;
use App\Models\maestro;
use App\Models\materias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'id_alumno'=> alumno::inRandomOrder()->first()->id,
            'id_materia'=> materias::inRandomOrder()->first()->id,
        ];
    }
}
