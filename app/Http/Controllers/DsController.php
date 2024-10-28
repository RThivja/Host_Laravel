<?php

namespace App\Http\Controllers;

use App\Models\DS; // Correctly reference the DS model
use Illuminate\Http\Request;

class DsController extends Controller
{
    public function getAllDs()
    {
        try {
            $allDs = DS::where('status', 1)->get()->map(function ($Ds) {
                // Ensure $Ds is defined before accessing its properties
                $Ds->image = $Ds->image ? url('api/images/' . basename($Ds->image)) : null;
                return $Ds;
            });
            return response()->json($allDs);
        } catch (\Exception $e) {
            \Log::error('Error fetching ds: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching ds', 'error' => $e->getMessage()], 500);
        }
    }
    

}
