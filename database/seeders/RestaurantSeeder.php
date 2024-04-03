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
        DB::beginTransaction();

        try {
            // Create 10 restaurants
            for ($i = 1; $i <= 10; $i++) {
                Restaurant::create([
                    'name' => $faker->company,
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
