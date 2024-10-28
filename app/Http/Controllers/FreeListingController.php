<?php

namespace App\Http\Controllers;

use App\Models\FreeListing;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FreeListingController extends Controller
{
    // Method to create a new free listing
    public function createListing(Request $request)
    {

        Log::info('Incoming request for Free Listing:', $request->all());

        $data = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'city' => 'required|integer',
            'district' => 'required|integer',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'contacts' => 'required|array',
            'contacts.*.type.value' => 'required|string', // Extract the `value` from `type`
            'contacts.*.value' => 'required|string',
        ]);

        Log::info('Form Data:', $data);

        


        try {
            // Prepare SEO URL
            $orgSeoUrl = strtolower(str_replace(' ', '-', $data['name']));

            // Insert into free_listings
            $freeListing = FreeListing::create([
                'org_name' => $data['name'],
                'org_seo_url' => $orgSeoUrl,
                'org_city' => $data['city'],
                'org_district' => $data['district'],
                'org_location' => $data['address'],
                'org_base_category' => $data['category'],
                'org_description' => $data['description'],
                'org_contact' => "",
                'org_created_date' => now(),
                'org_update_date' => now()
            ]);

            
            // Insert contacts
            foreach ($data['contacts'] as $contact) {
                Contact::create([
                    'org_id' => $freeListing->org_id,
                    'type' => $contact['type']['value'],  // Use the value field from `type`
                    'value' => $contact['value']
                ]);
            }

            return response()->json($freeListing, 200);

        } catch (\Exception $e) {
            // Log the error with more context
            Log::error('Error creating free listing: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return a detailed error message for development (can be customized for production)
            return response()->json([
                'error' => 'An error occurred while creating the listing.',
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
}
