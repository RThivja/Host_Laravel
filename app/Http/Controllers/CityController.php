<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // Method to get all cities
    public function getAllCities()
    {
        try {
            // Retrieve all cities efficiently
            $cities = City::where('city_status', 1)  // Fetch only active cities
                ->select('city_id', 'city_name', 'city_district', 'city_status') // Optimize by selecting specific fields
                ->get();
            
            return response()->json($cities, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Method to get city by ID
    public function getCityById($id)
    {
        try {
            // Retrieve city by ID and ensure it's active
            $city = City::where('city_status', 1)->find($id);

            if ($city) {
                return response()->json($city, 200);
            } else {
                return response()->json(['message' => 'City not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
