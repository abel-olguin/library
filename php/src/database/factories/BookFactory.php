<?php

namespace Database\Factories;

use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->words(asText: true);
        return [
            'name' => $title,
            'slug' => str($title." ".uniqid())->slug(),
            'publication_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(BookStatus::cases()),
            'image' => 'https://via.placeholder.com/200x200?text='.str($title)->replace(' ','\n'),
        ];
    }
}
