<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    // Method to get all districts
    public function getAllDistricts()
    {
        try {
            // Retrieve all districts
            $districts = District::all();
            return response()->json($districts, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Method to get district by ID
    public function getDistrictById($id)
    {
        try {
            // Retrieve district by ID
            $district = District::find($id);

            if ($district) {
                return response()->json($district, 200);
            } else {
                return response()->json(['message' => 'District not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
