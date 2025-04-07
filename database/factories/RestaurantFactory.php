<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = $this->generateUniqueSquareImageUrl(200, 200);
        return [
            "name" => fake()->company(),
            "description" => fake()->text(30),
            'image_url' => $imageUrl,
        ];
    }
    protected function generateUniqueSquareImageUrl($width, $height)
    {
        // Utilise Lorem Picsum pour générer une image carrée unique
        $randomId = $this->faker->numberBetween(1, 1000); // Génère un ID aléatoire
        return "https://picsum.photos/id/{$randomId}/{$width}/{$height}";
    }
}
