<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Boissons',
            'Entrées',
            'Plats principaux',
            'Accompagnements',
            'Desserts',
            'Cafés et thés',
            'Vins',
            'Cocktails',
            'Menus enfants',
            'Plats végétariens',
            'Plats véganes',
            'Plats sans gluten',
            'Spécialités de la maison',
            'Plats du jour',
            'Promotions'
        ];
        $randomCategory = fake()->randomElement($categories);

        return [
            "name" => $randomCategory,
            "restaurant_id" => rand(1,25),

        ];
    }
}
