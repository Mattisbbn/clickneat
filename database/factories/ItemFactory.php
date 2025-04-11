<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $foodNames = [
            'Pizza Margherita',
            'Burger Classique',
            'Salade César',
            'Sushi au Saumon',
            'Pâtes Carbonara',
            'Tacos au Poulet',
            'Curry de Légumes',
            'Soupe à l\'Oignon',
            'Croissant',
            'Cheesecake',
        ];
        $rdmImage = $this->generateUniqueSquareImageUrl(500,500);
        return [
            "name" => fake()->randomElement($foodNames),
            "description" => fake()->text(30),
            "price" => rand(100,9999),
            "cost" => rand(100,9999),
            "is_active" => rand(0,1),
            "category_id" => rand(1,200),
            "image_url" =>$rdmImage,
        ];
    }


    protected function generateUniqueSquareImageUrl($width, $height)
    {
        // Utilise Lorem Picsum pour générer une image carrée unique
        $randomId = $this->faker->numberBetween(1, 400); // Génère un ID aléatoire
        return "https://picsum.photos/id/{$randomId}/{$width}/{$height}";
    }
}
