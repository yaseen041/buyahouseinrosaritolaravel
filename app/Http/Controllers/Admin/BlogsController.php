<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ParentBlogCategories;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Blogs::query();
    //     $query->Join('categories', 'blogs.category_id', '=', 'categories.id')
    //         ->select('blogs.*', 'categories.title as category_title');
    //     if ($request->has('search') && !empty($request->search)) {
    //         $searchTerm = $request->search;
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('blogs.title', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('blogs.description', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('blogs.meta_description', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('categories.title', 'LIKE', '%' . $searchTerm . '%');
    //         });
    //     }
    //     $blogs = $query->orderBy('blogs.id', 'DESC')->paginate(50);
    //     return view('admin.blogs.manage_blogs', compact('blogs'));
    // }
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
        return view('admin.blogs.manage_blogs', compact('blogs'));
    }

    public function create(Request $request)
    {

        $data['categories'] = Categories::all();
        $data['blogs'] = Blogs::with('children')->whereNull('parent_id')->get();
        return view('admin.blogs.create_blog', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'tier' => 'required',
                'title' => 'required',
                'post_url' => 'required',
                'category' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_title' => 'nullable',
                'meta_keywords' => 'nullable',
                'meta_description' => 'nullable',
                'facebook_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'facebook_meta_title' => 'nullable',
                'facebook_meta_description' => 'nullable',
                'twitter_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'twitter_meta_title' => 'nullable',
                'twitter_meta_description' => 'nullable',
                'json_ld_code' => 'nullable',
                'parent_id' => 'nullable|array',
                'parent_id.*' => 'exists:blogs,id',
            ],
            [
                'post_url.required' => 'The Post URL field is required.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }
        if ($request->hasFile('featured_image')) {
            $fea_image = $request->file('featured_image');
            $file_name = explode('.', $fea_image->getClientOriginalName())[0];
            $data['featured_image'] = $file_name . '-' . time() . '.' . $fea_image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $fea_image->move($destinationPath, $data['featured_image']);
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $data['facebook_meta_image'] = $file_name2 . '-' . time() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('/assets/images');
            $fb_image->move($destinationPath2, $data['facebook_meta_image']);
        }else{
            $data['facebook_meta_image'] = null;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $data['twitter_meta_image'] = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('/assets/images');
            $tw_image->move($destinationPath3, $data['twitter_meta_image']);
        }else{
            $data['twitter_meta_image'] = null;
        }

        $query = Blogs::create([
            'tier' => $data['tier'],
            'title' => $data['title'],
            'category_id' => $data['category'],
            // 'parent_id' => isset($data['parent_id']) ? $data['parent_id'] : null,
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'fb_image' => $data['facebook_meta_image'],
            'fb_title' => $data['facebook_meta_title'],
            'fb_description' => $data['facebook_meta_description'],
            'twitter_image' => $data['twitter_meta_image'],
            'twitter_title' => $data['twitter_meta_title'],
            'twitter_description' => $data['twitter_meta_description'],
            'json_ld_code' => $data['json_ld_code'],
            'post_url' => $data['post_url'],
            'author_id' => Auth()->user()->id,
            'status' => isset($data['status']) ? '1' : '0',
            'disable_crawl' => isset($data['disable_crawl']) ? '1' : '0',
            'publish_date' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($request->has('parent_id')) {
            foreach ($request->parent_id as $parent_id) {
                ParentBlogCategories::insert([
                    'blog_id' => $query->id,
                    'parent_id' => $parent_id,
                ]);
            }
        }

        if ($query->id > 0) {
            return response()->json(['msg' => 'success', 'response' => 'Blog saved successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function show(Request $request)
    {
        $data['categories'] = Categories::all();
        $data['blogs'] = Blogs::select('id', 'title')->get();
        $data['blog'] = Blogs::where('id', $request->id)->first();

        $data['parent_ids'] = ParentBlogCategories::select('parent_id')->where('blog_id', $request->id)->pluck('parent_id')->toArray();

        return view('admin.blogs.edit_blog', $data);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'tier' => 'required',
                'title' => 'required',
                'category' => 'required',
                'post_url' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_title' => 'nullable',
                'meta_keywords' => 'nullable',
                'meta_description' => 'nullable',
                'facebook_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'facebook_meta_title' => 'nullable',
                'facebook_meta_description' => 'nullable',
                'twitter_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'twitter_meta_title' => 'nullable',
                'twitter_meta_description' => 'nullable',
                'json_ld_code' => 'nullable',
                'parent_id' => 'nullable|array',
                'parent_id.*' => 'exists:blogs,id',
            ],
            [
                'post_url.required' => 'The Post URL field is required.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $blog = Blogs::find($data['id']);
        if ($blog) {
            if ($request->hasFile('featured_image')) {
                $fea_image = $request->file('featured_image');
                $file_name = explode('.', $fea_image->getClientOriginalName())[0];
                $data['featured_image'] = $file_name . '-' . time() . '.' . $fea_image->getClientOriginalExtension();
                $destinationPath = public_path('/assets/images');
                $fea_image->move($destinationPath, $data['featured_image']);
                if (file_exists(public_path('/assets/images/' . $blog->featured_image))) {
                    @unlink(public_path('/assets/images/' . $blog->featured_image));
                }
            } else {
                $data['featured_image'] = $blog->featured_image;
            }

            if ($request->hasFile('facebook_meta_image')) {
                $fb_image = $request->file('facebook_meta_image');
                $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
                $data['facebook_meta_image'] = $file_name2 . '-' . time() . '.' . $fb_image->getClientOriginalExtension();
                $destinationPath2 = public_path('/assets/images');
                $fb_image->move($destinationPath2, $data['facebook_meta_image']);
                if (file_exists(public_path('/assets/images/' . $blog->fb_image))) {
                    @unlink(public_path('/assets/images/' . $blog->fb_image));
                }
            } else {
                $data['facebook_meta_image'] = $blog->fb_image;
            }

            if ($request->hasFile('twitter_meta_image')) {
                $tw_image = $request->file('twitter_meta_image');
                $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
                $data['twitter_meta_image'] = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
                $destinationPath3 = public_path('/assets/images');
                $tw_image->move($destinationPath3, $data['twitter_meta_image']);
                if (file_exists(public_path('/assets/images/' . $blog->twitter_image))) {
                    @unlink(public_path('/assets/images/' . $blog->twitter_image));
                }
            } else {
                $data['twitter_meta_image'] = $blog->twitter_image;
            }

            $query = Blogs::where('id', $data['id'])->update([
                'tier' => $data['tier'],
                'title' => $data['title'],
                'category_id' => $data['category'],
                // 'parent_id' => isset($data['parent_id']) ? $data['parent_id'] : null,
                'short_description' => $data['short_description'],
                'description' => $data['description'],
                'featured_image' => $data['featured_image'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'fb_image' => $data['facebook_meta_image'],
                'fb_title' => $data['facebook_meta_title'],
                'fb_description' => $data['facebook_meta_description'],
                'twitter_image' => $data['twitter_meta_image'],
                'twitter_title' => $data['twitter_meta_title'],
                'twitter_description' => $data['twitter_meta_description'],
                'json_ld_code' => $data['json_ld_code'],
                'post_url' => $data['post_url'],
                'author_id' => Auth()->user()->id,
                'status' => isset($data['status']) ? '1' : '0',
                'disable_crawl' => isset($data['disable_crawl']) ? '1' : '0',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $id = $data['id'];
            // Get existing parent blog IDs
            $existingParentIds = ParentBlogCategories::where('blog_id', $id)->pluck('parent_id')->toArray();

            $newParentIds = $request->parent_id ?? [];
            $idsToRemove = array_diff($existingParentIds, $newParentIds);
            $idsToAdd = array_diff($newParentIds, $existingParentIds);
            ParentBlogCategories::where('blog_id', $id)
                ->whereIn('parent_id', $idsToRemove)
                ->delete();
            foreach ($idsToAdd as $parent_id) {
                ParentBlogCategories::insert([
                    'blog_id' => $id,
                    'parent_id' => $parent_id,
                ]);
            }
            if ($query > 0) {
                return response()->json(['msg' => 'success', 'response' => 'Blog updated successfully.']);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $status = Blogs::find($data['id'])->delete();
        if ($status > 0) {
            return response()->json(['msg' => 'success', 'response' => 'Article deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }
}
