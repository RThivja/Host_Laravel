<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Freelisting_CategoryController extends Controller
{
   // Get all categories or search by keyword
   public function getCategories(Request $request)
   {
       $keyword = $request->input('keyword');
       $baseCondition = ['cate_status' => 1];

       $query = Category::where($baseCondition);

       if ($keyword) {
           $words = explode(' ', $keyword);
           $query->where(function ($q) use ($words) {
               foreach ($words as $word) {
                   $q->orWhere('cate_name', 'like', '%' . $word . '%');
               }
           });
       }

       $categories = $query->get();

       return response()->json($categories);
   }

   // Get filtered categories by name
   public function getFiltered(Request $request)
   {
       $name = $request->input('name');
   
       // Initialize the query with base condition
       $query = Category::where('cate_status', 1);
   
       if ($name) {
           // Split the name into keywords
           $keywords = array_map('strtolower', explode(' ', $name));
           
           // Group the orWhere conditions within the base condition
           $query->where(function ($q) use ($keywords) {
               foreach ($keywords as $keyword) {
                   $q->orWhere('cate_name', 'like', '%' . $keyword . '%');
               }
           });
       }
   
       // Get the filtered categories
       $categories = $query->get();
   
       // Return the categories as a JSON response
       return response()->json($categories);
   }
   

   // Get category by ID
   public function getCategoryById($id)
   {
       $category = Category::where('cate_status', 1)->find($id);

       if ($category) {
           return response()->json($category);
       } else {
           return response()->json(['message' => 'Category not found'], 404);
       }
   }
}
