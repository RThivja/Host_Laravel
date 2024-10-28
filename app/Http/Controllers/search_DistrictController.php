<?php

namespace App\Http\Controllers;

use App\Models\search_District;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class search_DistrictController extends Controller
{
    public function getAllDistricts(): JsonResponse
    {
        try {
            $districts = search_District::all();
            return response()->json($districts);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
