<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use App\Models\Restaurant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;
use App\Models\Allergens;
use App\Models\Ingredients;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Client',
            'email' => 'client@example.com',
            'role' => 'client'
        ]);

        User::factory()->create([
            'name' => 'Restaurant',
            'email' => 'restaurant@example.com',
            'role' => 'restaurateur'
        ]);

        Restaurant::factory(25)->create();
        Category::factory(200)->create();
        Item::factory(250)->create();
        Table::factory(150)->create();
        Allergens::factory(1000)->create();
        Ingredients::factory(1000)->create();
    }
}
