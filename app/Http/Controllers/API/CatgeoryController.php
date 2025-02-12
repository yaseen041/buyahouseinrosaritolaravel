<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CatgeoryController extends Controller
{
    public function index(){
        $categories = Categories::all();

        return response()->json(['message' => 'Categories retrieved successfully', 'data' => $categories], 200);
    }

    public function show($id){
        $category = Categories::find($id);

        if($category){
            return response()->json(['message' => 'Category retrieved successfully', 'data' => $category], 200);
        }else{
            return response()->json(['message' => 'Category not found'], 404);
        }
    }
}
