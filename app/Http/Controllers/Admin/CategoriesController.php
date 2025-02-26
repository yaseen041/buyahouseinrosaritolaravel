<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Categories::query()->with('parent');
        $search = $request->input('search');
        if ($request->has('search') && !empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhereHas('parent', function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
            });
        }
        $data['categories'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/categories/manage_categories', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'parent_category' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }
        $slug = $request->slug;
        if ($slug && Categories::where('slug', $slug)->exists()) {
            return response()->json([
                'msg' => 'error',
                'response' => 'Category with this slug already exists.',
            ]);
        }

        // Generate slug if not provided or if provided slug is null/empty
        $slug = $slug ?: correctSlug($request->title, 'categories');

        $category = new Categories();
        $category->title = $request->title;
        $category->slug = $slug;

        if ($request->has('parent_category')) {
            $category->parent_id = $request->parent_category;
        } else {
            $category->parent_id = null;
        }
        $category->save();

        if ($category->id > 0) {
            return response()->json(['msg' => 'success', 'response' => 'Category added successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function show(Request $request)
    {
        $category = Categories::find($request->id);

        $categories = Categories::all();
        if ($category) {
            $htmlresult = view('admin/categories/category_ajax', compact('category', 'categories'))->render();
            return response()->json([
                'msg' => 'success',
                'response' => $htmlresult
            ]);
        } else {
            return response()->json([
                'msg' => 'error',
                'response' => 'Category not found.'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'parent_category' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $category = Categories::find($request->id);

        if (!$category) {
            return response()->json(['msg' => 'error', 'response' => 'Category not found.']);
        }
        if ($request->slug != '' || $request->slug != null) {

            if ($category->slug == $request->slug) {
                $newSlug = $request->slug;
            } else {

                $newSlug = correctSlug($request->slug, 'categories');
            }
        } else {
            $newSlug = correctSlug($request->title, 'categories');
        }


        $category->title = $request->title;
        $category->slug = $newSlug;
        if ($request->has('parent_category')) {
            $category->parent_id = $request->parent_category;
        } else {
            $category->parent_id = null;
        }
        $query = $category->save();
        if ($query) {
            return response()->json(['msg' => 'success', 'response' => 'Category updated successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function delete(Request $request)
    {
        $category = Categories::find($request->id);
        if ($category) {
            $childCount = Categories::where('parent_id', $request->id)->count();
            $blogCount = DB::table('blogs')->where('category_id', $request->id)->count();
            if ($childCount > 0) {
                return response()->json(['msg' => 'error', 'response' => 'Could not delete. This category has child categories.']);
            }

            if ($blogCount > 0) {
                return response()->json(['msg' => 'error', 'response' => 'Could not delete. This category has associated blog records.']);
            }
            $category->delete();

            return response()->json(['msg' => 'success', 'response' => 'Category deleted successfully.']);
        }

        return response()->json(['msg' => 'error', 'response' => 'Category not found.']);
    }
}
