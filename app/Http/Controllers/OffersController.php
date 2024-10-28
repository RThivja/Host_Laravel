<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function getAllOffers()
{
    try {
        \Log::info('Fetching all offers'); // Debug log
        $allOffers = Offers::where('status', 1)->get()->map(function ($offer) {
            $offer->image = $offer->image ? url('api/images/' . basename($offer->image)) : null;
            return $offer;
        });
        return response()->json($allOffers);
    } catch (\Exception $e) {
        \Log::error('Error fetching offers: ' . $e->getMessage());
        return response()->json(['message' => 'Error fetching offers', 'error' => $e->getMessage()], 500);
    }
}

}
