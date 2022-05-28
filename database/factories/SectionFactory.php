<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'text',
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(15),
        ];
    }
}