<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clase>
 */
class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->text(),
            'body'=>$this->faker->paragraph(),
            'summary'=>$this->faker->paragraph(),
            'pkey1'=>$this->faker->word(),
            'pkey2'=>$this->faker->word(),
            'pkey3'=>$this->faker->word(),
            'profesor_id'=>rand(1,35),
            'contenido_id'=>rand(37,86)

        ];
    }
}
