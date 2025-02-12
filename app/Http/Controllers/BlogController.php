<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ParentBlogCategories;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blogs::query();
        $query->Join('categories', 'blogs.category_id', '=', 'categories.id')
        ->select('blogs.*', 'categories.title as category_title');
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('blogs.title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('blogs.description', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('blogs.meta_description', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('categories.title', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $blogs = $query->orderBy('blogs.id', 'DESC')->paginate(50);
        return view('blogs.blog', compact('blogs'));
    }

}
