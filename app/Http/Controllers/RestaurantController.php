<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Traits\Helper as ApiResponseTrait;

class RestaurantController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $restaurants = RestaurantResource::collection(Restaurant::all());
            return $this->result(true, $restaurants, [], 'Restaurants list', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve restaurants', 500);
        }
    }

    public function show($hashed_id)
    {
        try {
            $id = $this->hashDecode($hashed_id);
            $restaurant = Restaurant::findOrFail($id);
            $restaurant = new RestaurantResource($restaurant);

            return $this->result(true, $restaurant, [], $hashed_id . ' restaurant', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve restaurant', 500);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email|unique:restaurants,email',
            ]);

            // Create new restaurant
            $restaurant = Restaurant::create($validatedData);
            $restaurant = new RestaurantResource($restaurant);
            DB::commit();
            return $this->result(true, $restaurant, [], 'Restaurant created successfully', 201);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to create restaurant', 500);
        }
    }

    public function update(Request $request, $hashed_id)
    {
        DB::beginTransaction();
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email',
            ]);

            // Find the restaurant

            $id = $this->hashDecode($hashed_id);
            $restaurant = Restaurant::findOrFail($id);

            // Update restaurant
            $restaurant->update($validatedData);
            $restaurant = RestaurantResource::collection($restaurant);
            DB::commit();

            return $this->result(true, $restaurant, [], 'Restaurant updated successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to update restaurant', 500);
        }
    }


    public function destroy($hashed_id)
    {
        DB::beginTransaction();
        try {
            $id = $this->hashDecode($hashed_id);
            $restaurant = Restaurant::findOrFail($id);
            $restaurant->delete();
            DB::commit();
            return $this->result(true, [], [], 'Restaurant deleted successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to delete restaurant', 500);
        }
    }
}
