<?php

namespace App\Http\Controllers;

use App\Models\Adds;
use Illuminate\Http\Request;

class AddsController extends Controller
{

public function getAllAdds()
{
    try {
        $allAdds = Adds::where('status', 1)->get()->map(function ($ad) {
            $ad->Logo = url('api/images/' . basename($ad->Logo)); // Ensure only filename is appended
            return $ad;
        });
        return response()->json($allAdds);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error fetching ads', 'error' => $e->getMessage()], 500);
    }
}



    // Method to add new ad
    public function createAdd(Request $request)
    {
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'Logo' => 'required|string',
                'href_link' => 'required|string|url',
                'status' => 'required|integer',
                'Org_name' => 'required|string', 
            ]);

            // Create a new ad record
            $newAdd = Adds::create($validatedData);

            // Return success response
            return response()->json([
                'message' => 'data created successfully!',
                'data' => $newAdd
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating ad', 
                'error' => $e->getMessage()
            ], 500);
        }
    }

     // Method to update an existing ad
     public function updateAdd(Request $request, $id)
{
    try {
        $ad = Adds::findOrFail($id);  // Find ad by ID
        $ad->update($request->only(['Logo', 'href_link', 'status', 'Org_name']));  // Update fields
        return response()->json(['message' => 'data updated successfully!', 'data' => $ad], 200);  // Success response
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error updating ad', 'error' => $e->getMessage()], 500);  // Error response
    }
}


// Delete Function
public function deleteAdd($id)
{
    try {
        $ad = Adds::findOrFail($id);  // Find ad by ID
        $ad->delete();  // Delete the ad
        return response()->json(['message' => 'data deleted successfully!'], 200);  // Success response
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error deleting ad', 'error' => $e->getMessage()], 500);  // Error response
    }
}

}
