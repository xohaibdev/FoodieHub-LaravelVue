<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;
use Faker\Factory as Faker;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $restuarents = [
            'Pizza Palace',
            'Burger Barn',
            'Taco Town',
            'Sushi Spot',
            'Pasta Paradise',
            'Salad Garden',
            'Sandwich Shack',
            'Soup Station',
            'Wrap World',
            'Quesadilla Corner'
        ];

        DB::beginTransaction();

        try {
            // Create 10 restaurants
            for ($i = 1; $i <= 10; $i++) {
                $restaurantName = $faker->unique()->randomElement($restuarents);

                Restaurant::create([
                    'name' => $restaurantName,
                    'address' => $faker->address,
                    'email' => $faker->unique()->safeEmail,
                    'webhook_endpoint' => 'http://example.com/webhook/' . $i,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
