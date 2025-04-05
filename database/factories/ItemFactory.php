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

        return [
            "name" => fake()->randomElement($foodNames),
            "description" => "ze",
            "price" => rand(10,100),
            "cost" => rand(10,100),
            "is_active" => rand(0,1),
            "category_id" => rand(1,10),
        ];
    }
}
