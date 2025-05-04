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
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => Hash::make('testadmin@1122'),
        ]);

        User::factory()->create([
            'name' => 'Client',
            'email' => 'client@test.com',
            'role' => 'client',
            'password' => Hash::make('testclient@1122'),
        ]);

        User::factory()->create([
            'name' => 'Restaurant',
            'email' => 'restaurant@test.com',
            'role' => 'restaurateur',
            'restaurant_id' => 1,
            'password' => Hash::make('testrestau@1122'),
        ]);

        Restaurant::factory(25)->create();
        Category::factory(200)->create();
        Item::factory(250)->create();
        Table::factory(150)->create();
        Allergens::factory(1000)->create();
        Ingredients::factory(1000)->create();
    }
}
