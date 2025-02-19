<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blogs::query();
        if ($request->has('category') && !empty($request->category)) {
            $category = Categories::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $blogs = $query->where('status', 1)->where('disable_crawl', 0)->orderBy('id', 'DESC')->paginate(9);
        foreach ($blogs as $blog) {
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);
            $blog->category = $blog->category->title ?? '';
        }

        return response()->json(['message' => 'success', 'data' => $blogs], 200);
    }

    public function categorySearch($id)
    {
        $blogs = Blogs::where('category_id', $id)->where('status', 1)->where('disable_crawl', 0)->paginate(9);

        if ($blogs->count() == 0) {
            return response()->json(['message' => 'No blogs found'], 404);
        }

        foreach ($blogs as $blog) {
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);
            $blog->category = $blog->category->title;
        }

        return response()->json(['message' => 'success', 'data' => $blogs], 200);
    }
    public function categorySearchSlug($slug)
    {
        $category = Categories::where('slug', $slug)->first();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $blogs = Blogs::where('category_id', $category->id)->where('status', 1)->where('disable_crawl', 0)->paginate(9);

        if ($blogs->count() == 0) {
            return response()->json(['message' => 'No blogs found'], 404);
        }

        foreach ($blogs as $blog) {
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);
            $blog->category = $blog->category->title;
        }

        return response()->json(['message' => 'success', 'data' => $blogs], 200);
    }
    public function show($id)
    {
        // get a single blog
        $blog = Blogs::find($id);
        if ($blog) {
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);
            $blog->category = $blog->category->title;
            $blog->relevant_blogs = Blogs::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->where('status', 1)->where('disable_crawl', 0)->limit(4)->get();
            foreach ($blog->relevant_blogs as $relevant_blog) {
                $relevant_blog->featured_image = asset('assets/images/' . $relevant_blog->featured_image);
                $relevant_blog->category = $relevant_blog->category->title;
            }
            return response()->json(['message' => 'success', 'data' => $blog], 200);
        } else {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    }

    public function fetchblog(Request $request)
    {
        // Decode JSON input correctly
        $data = json_decode($request->getContent(), true);

        // if (isset($data['fileContent'])) {
        //     // $fileContent = base64_decode($data['fileContent']);
        //     // // echo $fileContent; // Consider logging instead of echoing in an API
        // } else {
        //     echo "No file content received.";
        // }

        // Fetch the blog based on post_url
        $blog = Blogs::where('post_url', $request->post_url)->first();

        if ($blog) {
            // Update featured image URL
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);

            // Fetch category title
            $blog->category = $blog->category->title;

            // Get relevant blogs
            $blog->relevant_blogs = Blogs::where('category_id', $blog->category_id)
                ->where('disable_crawl', 0)
                ->where('status', 1)
                ->where('id', '!=', $blog->id)
                ->limit(4)
                ->get();

            // Update each relevant blog's image and category title
            foreach ($blog->relevant_blogs as $relevant_blog) {
                $relevant_blog->featured_image = asset('assets/images/' . $relevant_blog->featured_image);
                $relevant_blog->category = $relevant_blog->category->title;
            }

            return response()->json(['message' => 'success', 'data' => $blog], 200);
        } else {
            return response()->json(['message' => 'Blog not found'], 404);
        }
    }


    public function discrawlblogs()
    {
        $blogs = Blogs::where('disable_crawl', 1)->get();
        $urls = [];
        foreach ($blogs as $blog) {
            $urls[] = 'https://buyahouseinrosarito.com/' . $blog->post_url;
        }

        return response()->json(['message' => 'success', 'data' => $urls], 200);
    }
}
