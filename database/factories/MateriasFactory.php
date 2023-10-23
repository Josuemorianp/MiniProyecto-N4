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
        $maestro = maestro::all();

        return [
            'nombre'=>$this->faker->name(),
            'uni_credito'=>$this->faker->randomNumber(),
            'id_maestro'=>$this->faker->randomElement($maestro)->id,
        ];
    }
}
