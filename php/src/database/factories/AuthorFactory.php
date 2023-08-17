<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->firstName;
        $last_name = $this->faker->lastName;

        return [
            'name' => $name,
            'last_name' => $last_name,
            'slug' => str("{$name} {$last_name} ".uniqid())->slug(),
            'birthday' => $this->faker->date(max:'-18 years'),
            'photo' => "https://via.placeholder.com/200x200?text=".$name,
        ];
    }
}
