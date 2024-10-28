<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\DsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Freelisting_CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FreeListingController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\search_SearchController;
use App\Http\Controllers\search_DistrictController;

// ******* Scrolling Section

// Route to get all ads with status 1
Route::get('/adds/viewall', [AddsController::class, 'getAllAdds']);

// Route to get all offers with status 1
Route::get('/offers/viewall', [OffersController::class, 'getAllOffers']);

// Route to get all ds with status 1
Route::get('/dscollection/viewall', [DsController::class, 'getAllDs']);



// ******* Contact Us Section

// send mail 
Route::post('/send-email', [EmailController::class, 'sendEmail']);



// ******* Freelisting Section

Route::get('/category/view', [Freelisting_CategoryController::class, 'getCategories']);
Route::get('/category/filtered', [Freelisting_CategoryController::class, 'getFiltered']);
Route::get('/category/view/{id}', [Freelisting_CategoryController::class, 'getCategoryById']);

// Route to get all cities
Route::get('/cities', [CityController::class, 'getAllCities']);

// Route to get a city by ID
Route::get('/cities/{id}', [CityController::class, 'getCityById']);

// Route to get all districts
Route::get('/districts', [DistrictController::class, 'getAllDistricts']);

// Route to get a district by ID
Route::get('/districts/{id}', [DistrictController::class, 'getDistrictById']);

Route::post('/freelisting', [FreeListingController::class, 'createListing']);


// ****** Currency

// Get all exchange rates
Route::get('/exchange-rates', [ExchangeRateController::class, 'getAllExchangeRates']);

// Get a specific exchange rate by currency code
Route::get('/exchange-rates/{currency}', [ExchangeRateController::class, 'getExchangeRateByCurrency']);

// *************** Catrgories

Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/categories/all', [CategoryController::class, 'getAllCategories']);
Route::get('/categories/search', [CategoryController::class, 'getCategorieSearch']);
Route::get('/categories/{id}', [CategoryController::class, 'getCategoryById']);


// ********* Search

Route::get('/search', [search_SearchController::class, 'searchCategoriesAndOrganizations']);
Route::get('/districts', [search_DistrictController::class, 'getAllDistricts']);