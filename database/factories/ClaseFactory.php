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
            'profesor_id'=>rand(1,100),
            'signature_id'=>rand(1,6)

        ];
    }
}
