<?php

namespace Database\Factories;

use App\Models\Evento;
use Carbon\Constants\Format;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->sentence(3),
            'local' => $this->faker->address(),
            'status' => $this->faker->randomElement(['aberto', 'em_andamento', 'fechado', 'encerrado']),
            'data' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
        ];
    }
}
