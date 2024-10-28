<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExchangeRateController extends Controller
{
    /**
     * Get all exchange rates.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllExchangeRates(Request $request)
    {
        try {
            $exchangeRates = ExchangeRate::all();
            return response()->json(['data' => $exchangeRates], 200);
        } catch (\Exception $error) {
            Log::error('Error fetching all exchange rates:', ['error' => $error->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Get a specific exchange rate by currency code.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $currency
     * @return \Illuminate\Http\JsonResponse
     */
    public function getExchangeRateByCurrency(Request $request, $currency)
    {
        try {
            // Validate the currency parameter
            if (!isset($currency) || strlen($currency) !== 3 || !ctype_alpha($currency)) {
                return response()->json(['error' => 'Invalid currency code provided.'], 400);
            }

            $currency = strtoupper($currency);

            // Find the exchange rate by currency code
            $exchangeRate = ExchangeRate::where('currency', $currency)->first();

            if (!$exchangeRate) {
                return response()->json(['error' => 'Exchange rate not found for the specified currency.'], 404);
            }

            return response()->json(['data' => $exchangeRate], 200);
        } catch (\Exception $error) {
            Log::error('Error fetching exchange rate:', ['error' => $error->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
