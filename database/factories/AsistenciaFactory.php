<?php

namespace Database\Factories;

use App\Models\alumno;
use App\Models\curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\asistencia>
 */
class AsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_curso'=> curso::inRandomOrder()->first()->id,
            'id_alumno'=> alumno::inRandomOrder()->first()->id,    
            'fecha'=> $this->faker->date,
            'asistencia'=> $this->faker->randomElement(['A','T','F']),
        ];
    }
}