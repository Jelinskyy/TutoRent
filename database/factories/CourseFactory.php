<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = ['laravel', 'vue', 'php', 'magento', 'symphony', 'javascript', 'pythone', 'c#', 'c++', '.net', 'spring', 'java'];

        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(5),
            'tags' => "{$tags[array_rand($tags)]}, {$tags[array_rand($tags)]}, {$tags[array_rand($tags)]}"
        ];
    }
}
