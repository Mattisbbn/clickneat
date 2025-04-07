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
        $icons = [
            'fa-solid fa-user',
            'fa-solid fa-star',
            'fa-solid fa-bolt',
            'fa-solid fa-heart',
            'fa-solid fa-check',
            'fa-brands fa-github',
            'fa-brands fa-laravel',
            'fa-brands fa-twitter',
        ];

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
        $randomIcon = fake()->randomElement($icons);
        return [
            "name" => $randomCategory,
            "restaurant_id" => rand(1,25),
            "fa_icon" => $randomIcon
        ];
    }
}
