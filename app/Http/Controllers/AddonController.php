<?php

namespace App\Http\Controllers;

use App\Events\AddonUpdated;
use Illuminate\Http\Request;
use App\Models\Addon;
use App\Http\Resources\AddonResource;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Traits\Helper as ApiResponseTrait;

class AddonController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {

            $resAddon = Addon::with('item', 'item.restaurant')->latest()->get();
            $addons = AddonResource::collection($resAddon);

            return $this->result(true, $addons, [], 'Addons list', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve addons', 500);
        }
    }

    public function show($hashed_id)
    {
        try {
            $id = $this->hashDecode($hashed_id);
            $addon = Addon::findOrFail($id);
            $addon = new AddonResource($addon);

            return $this->result(true, $addon, [], 'Addon details', 200);
        } catch (Exception $e) {
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to retrieve addon', 500);
        }
    }


    public function update(Request $request, $hashed_id)
    {
        DB::beginTransaction();
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string',
            ]);

            // Find the addon
            $id = $this->hashDecode($hashed_id);
            $addon = Addon::findOrFail($id);

            // Update addon
            $addon->update($validatedData);

            $addonResource = new AddonResource($addon);

            DB::commit();


            return $this->result(true, $addonResource, [], 'Addon updated successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to update addon', 500);
        }
    }

    public function destroy($hashed_id)
    {
        DB::beginTransaction();
        try {
            $id = $this->hashDecode($hashed_id);

            \Log::debug($id);
            $addon = Addon::findOrFail($id);
            $addon->delete();
            DB::commit();
            return $this->result(true, [], [], 'Addon deleted successfully', 200);
        } catch (Exception $e) {
            DB::rollback();
            return $this->result(false, [], ['error' => $e->getMessage()], 'Failed to delete addon', 500);
        }
    }
}
