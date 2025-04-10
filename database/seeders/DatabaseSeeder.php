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
        ]);

        User::factory()->create([
            'name' => 'Client',
            'email' => 'client@example.com',
        ]);

        User::factory()->create([
            'name' => 'Restaurant',
            'email' => 'restaurant@example.com',
        ]);

        Restaurant::factory(25)->create();
        Category::factory(200)->create();
        Item::factory(400)->create();
        Table::factory(150)->create();
    }
}
