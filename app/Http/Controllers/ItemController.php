<?php

namespace App\Http\Controllers;

use App\Events\ItemUpdated;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Resources\ItemResource;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Traits\Helper as ApiResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\Addon;

class ItemController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $resItems = Item::with('restaurant')->latest()->get();
            $items = ItemResource::collection($resItems);
            return $this->result(true, $items, [], 'Items list', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve items', 500);
        }
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // Validate incoming request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'restaurant_id' => 'required',
                'addons' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Create a new item
            $item = Item::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'restaurant_id' => $this->hashDecode($request->input('restaurant_id')),
            ]);

            // Split addons string into an array
            $addons = explode(',', $request->input('addons'));

            foreach ($addons as $addonName) {
                $addonName = trim($addonName);

                // Create a new addon associated with the item
                $addon = Addon::create([
                    'name' => $addonName,
                    'item_id' => $item->id,
                ]);
            }

            DB::commit();
            // Return a success response
            return $this->result(true, $item, [], 'Item added successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to add menu item', 500);
        }
    }
    public function show($hashed_id)
    {
        try {
            $id = $this->hashDecode($hashed_id);
            $item = Item::findOrFail($id);
            $item = new ItemResource($item);

            return $this->result(true, $item, [], 'Item details', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve item', 500);
        }
    }

    public function update(Request $request, $hashed_id)
    {
        DB::beginTransaction();
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
            ]);

            // Find the item
            $id = $this->hashDecode($hashed_id);
            $item = Item::findOrFail($id);

            // Update item
            $item->update($validatedData);

            $itemResource = new ItemResource($item);

            DB::commit();

            return $this->result(true, $itemResource, [], 'Item updated successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to update item', 500);
        }
    }

    public function destroy($hashed_id)
    {
        DB::beginTransaction();
        try {
            $id = $this->hashDecode($hashed_id);
            $item = Item::findOrFail($id);

            // Delete all addons associated with the item
            $item->addons()->delete();

            $item->delete();
            DB::commit();
            return $this->result(true, [], [], 'Item deleted successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to delete item', 500);
        }
    }
}
