<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Addon;

use App\Models\Restaurant;

use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::beginTransaction();

        try {
            $restaurants = Restaurant::all();
            $eatableItems = ['Pizza', 'Burger', 'Sandwich', 'Salad', 'Pasta', 'Sushi', 'Taco', 'Soup', 'Wrap', 'Quesadilla'];
            $addonCategories = ['Cheese', 'Sauce', 'Toppings', 'Dressing', 'Croutons', 'Bacon', 'Avocado', 'Olives', 'Onions', 'Jalapenos'];

            foreach ($restaurants as $restaurant) {

                // Create 10 items for each restaurant
                foreach ($eatableItems as $eatableItem) {
                    $item = $restaurant->items()->create([
                        'name' => $eatableItem,
                        'price' => $faker->randomFloat(2, 5, 50),
                    ]);

                    // Create 5 addons for each item
                    for ($j = 1; $j <= 5; $j++) {
                        $addonName = $faker->randomElement($addonCategories) . ' ' . $faker->randomElement(['Extra', 'Additional', 'Special']); // Generating unique addon names
                        $item->addons()->create([
                            'name' => $addonName,
                        ]);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
