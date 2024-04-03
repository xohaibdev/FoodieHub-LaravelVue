<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
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

            foreach ($restaurants as $restaurant) {

                // Create 10 items for each restaurant
                for ($i = 1; $i <= 10; $i++) {
                    $item = $restaurant->items()->create([
                        'name' => $faker->word,
                        'price' => $faker->randomFloat(2, 5, 50),
                    ]);

                    // Create 5 addons for each item
                    for ($j = 1; $j <= 5; $j++) {
                        $item->addons()->create([
                            'name' => $faker->word,
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
