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
        $bannerUrl = $this->generateUniqueSquareImageUrl(1920, 500);
        return [
            "name" => fake()->company(),
            "description" => fake()->text(30),
            'logo_url' => $imageUrl,
            'banner_url' => $bannerUrl,
            'address' => fake()->address()
        ];
    }
    protected function generateUniqueSquareImageUrl($width, $height)
    {
        // Utilise Lorem Picsum pour générer une image carrée unique
        $randomId = $this->faker->numberBetween(1, 400); // Génère un ID aléatoire
        return "https://picsum.photos/id/{$randomId}/{$width}/{$height}";
    }
}
