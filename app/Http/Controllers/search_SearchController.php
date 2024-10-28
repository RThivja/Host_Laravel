<?php

namespace App\Http\Controllers;

use App\Models\search_Category;
use App\Models\search_Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class search_SearchController extends Controller
{
    public function searchCategoriesAndOrganizations(Request $request): JsonResponse
    {
        $districtId = $request->query('districtId');
        $searchQuery = $request->query('searchQuery');
        $limit = (int) $request->query('limit', 10);
        $offset = (int) $request->query('offset', 0);

        if (empty($searchQuery)) {
            return response()->json(['message' => 'Search query is required'], 400);
        }

        try {
            // Fetch organizations with optional district filter and category relationships
            $organizations = search_Organization::select(
                    'organizations.org_id',
                    'organizations.org_name',
                    'organizations.org_seo_url',
                    'organizations.org_city',
                    'organizations.org_district',
                    'organizations.org_location',
                    'organizations.org_base_category',
                    'organizations.org_description'
                )
                ->where('organizations.org_name', 'like', "%{$searchQuery}%")
                ->when($districtId, function ($query) use ($districtId) {
                    return $query->where('organizations.org_district', $districtId);
                })
                ->with(['categories' => function ($query) {
                    $query->select(
                        'categories.cate_id',
                        'categories.cate_name',
                        'category__organizations.org_id as CategoryOrganization'
                    )->distinct();
                }])
                ->limit($limit)
                ->offset($offset)
                ->get();

            // Count total organizations matching the search
            $orgCount = search_Organization::where('org_name', 'like', "%{$searchQuery}%")
                ->when($districtId, function ($query) use ($districtId) {
                    return $query->where('org_district', $districtId);
                })
                ->count();

            // Fetch categories with organizations filtered by district if needed
            $categories = search_Category::select('categories.cate_id', 'categories.cate_name', 'categories.cate_seo_url')
                ->where('categories.cate_name', 'like', "%{$searchQuery}%")
                ->with(['organizations' => function ($query) use ($districtId) {
                    if ($districtId) {
                        $query->where('organizations.org_district', $districtId);
                    }
                    $query->select(
                        'organizations.org_id',
                        'organizations.org_name',
                        'organizations.org_seo_url',
                        'organizations.org_city',
                        'organizations.org_district',
                        'organizations.org_location',
                        'organizations.org_base_category',
                        'organizations.org_description',
                        'category__organizations.cate_id as CategoryOrganization'
                    )->distinct();
                }])
                ->limit($limit)
                ->offset($offset)
                ->get();

            // Count total categories matching the search
            $catCount = search_Category::where('cate_name', 'like', "%{$searchQuery}%")->count();

            return response()->json([
                'Categories' => [
                    'rows' => $categories->toArray(),
                    'count' => $catCount,
                ],
                'Organizations' => [
                    'rows' => $organizations->toArray(),
                    'count' => $orgCount,
                ],
            ], 200);
        } catch (\Exception $e) {
            Log::error("Error fetching search results: {$e->getMessage()}");
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }
}
