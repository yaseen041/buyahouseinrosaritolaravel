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
        $query = Blogs::with('category')->where('status', 1);
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('meta_description', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('category', function ($q) use ($searchTerm) {
                  $q->where('title', 'LIKE', '%' . $searchTerm . '%');
              });
            });
        }
        $data['blogs'] = $query->orderBy('id', 'DESC')->paginate(9);
        return view('blogs.blog', $data);
    }


    public function handleSlug($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        if ($category) {
            return $this->get_categories_blog($slug);
        }
        $blog = Blogs::where('post_url', $slug)->where('status', 1)->first();
        if ($blog) {
            return $this->blog_details($slug);
        }

        return view('common.view_404');
    }


    public function blog_details($url)
    {
        $data['blog'] = Blogs::with('category')->where('status', 1)->where('post_url', $url)->first();
        if (!$data['blog']) {
            return view('common.view_404');
        }
        return view('blogs.blog_details', $data);
    }


    public function get_categories_blog($url)
    {
        $category = Categories::where('slug', $url)->first();
        if (!$category) {
            return view('common.view_404');
        }
        $data['blogs'] = Blogs::with('category')->where('status', 1)->where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(9);
        return view('blogs.blog', $data);
    }


}
