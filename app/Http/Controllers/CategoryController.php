<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get paginated categories showmoreicon where cate_status is 1 (only cate_id and cate_name)
    public function getCategories(Request $request)
    {
        $limit = $request->query('limit', 20); // Default limit is 20
        $offset = $request->query('offset', 0); // Default offset is 0

        $categories = CategoryModel::select('cate_id', 'cate_name')
            ->where('cate_status', 1) // Only active categories
            ->limit($limit)
            ->offset($offset)
            ->get(); // Fetch the categories

        return response()->json($categories, 200); // Send the categories as JSON
    }

    // Get all active allcategories  home pages icons (cate_status = 1)
    public function getAllCategories()
    {
        $categories = CategoryModel::select('cate_id', 'cate_name')
            ->where('cate_status', 1)
            ->get(); // Fetch all active categories

        return response()->json($categories, 200); // Send the categories as JSON
    }

    // Search categories search by cate_name where cate_status is 1
    public function getCategorieSearch(Request $request)
    {
        $limit = $request->query('limit', 20); // Default limit is 20
        $offset = $request->query('offset', 0); // Default offset is 0
        $search = $request->query('search', ''); // Default search is empty string

        $categories = CategoryModel::select('cate_id', 'cate_name')
            ->where('cate_status', 1)
            ->where('cate_name', 'like', '%' . $search . '%') // Search by cate_name
            ->limit($limit)
            ->offset($offset)
            ->get(); // Fetch the search results

        return response()->json($categories, 200); // Send the categories as JSON
    }

    // Get a single category by ID where cate_status is 1 (only cate_id and cate_name)
    public function getCategoryById($id)
    {
        // Validate that the ID is a number and greater than 0
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['message' => 'Invalid category ID'], 400); // Send 400 response for invalid ID
        }

        $category = CategoryModel::select('cate_id', 'cate_name')
            ->where('cate_id', $id)
            ->where('cate_status', 1)
            ->first(); // Find the category by ID and cate_status = 1

        if ($category) {
            return response()->json($category, 200); // Send the category if found
        } else {
            return response()->json(['message' => 'Category not found or inactive'], 404); // Send 404 if not found
        }
    }
}
