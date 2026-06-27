<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'course' => fake()->randomElement([
                'BSIT',
                'BSCS',
                'BSEd',
                'BSBA',
                'BSHM'
            ]),
            'year_level' => fake()->numberBetween(1, 4),
        ];
    }
}