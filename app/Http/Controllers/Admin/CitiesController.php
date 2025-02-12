<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $query = City::query();
        $search_query = $request->input('search_query');
        if ($request->has('search_query') && !empty($search_query)) {
            $query->where(function ($query) use ($search_query) {
                $query->where('name', 'like', '%' . $search_query . '%')
                    ->orWhere('state', 'like', '%' . $search_query . '%')
                    ->orWhere('country', 'like', '%' . $search_query . '%');
            });
        }
        $data['cities'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/cities/manage_cities', $data);
    }
    public function add()
    {
        return view('admin/cities/add_city');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'facebook_meta_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook_meta_title' => 'required',
            'facebook_meta_description' => 'required',
            'twitter_meta_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_meta_title' => 'required',
            'twitter_meta_description' => 'required',
            'json_ld_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $city = City::where('name', $request->name)->first();
        if (!empty($city)) {
            return back()->with('error', 'City already exists!');
        }
        $slug = $request->slug;
        if ($request->slug == null || $request->slug == '') {
            $slug = correctSlug($request->title, 'neighborhoods');
        }
        $city = new City();
        $city->name = $request->name;
        $city->state = $request->state ?? '';
        $city->country = $request->country ?? '';
        $city->description = $request->description ?? '';
        $city->slug = $slug;
        $city->meta_title = $request->meta_title ?? '';
        $city->meta_description = $request->meta_description ?? '';
        $city->meta_keywords = $request->meta_keywords ?? '';
        $city->fb_title = $request->facebook_meta_title ?? '';
        $city->fb_description = $request->facebook_meta_description ?? '';
        $city->twitter_title = $request->twitter_meta_title ?? '';
        $city->twitter_description = $request->twitter_meta_description ?? '';
        $city->json_ld_code = $request->json_ld_code ?? '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/cities/'), $filename);
            $city->image = $filename;
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('uploads/cities/');
            $fb_image->move($destinationPath2, $fbfile);
            $city->fb_image = $fbfile;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads/cities/');
            $tw_image->move($destinationPath3, $twfile);
            $city->twitter_image = $twfile;
        }
        $city->save();

        if ($city->id > 0) {
            return response()->json(['msg' => 'success', 'response' => 'City added successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        if (!empty($city)) {
            return view('admin/cities/edit_city', compact('city'));
        } else {
            return redirect('admin/cities')->with('error', 'City not found.');
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'City Name is required!');
        }
        $city = City::where('id', $request->id)->first();
        if (!empty($city)) {

            $citcheck = City::where('name', $request->name)->where('id', '!=', $request->id)->first();
            if ($citcheck) {
                return back()->with('error', 'Antoher City with this name already exists!');
            }
            if ($request->title != $city->title) {
                $city->slug = correctSlug($request->title, 'cities');
            } else {
                $city->slug = $request->slug;
            }
            $city->name = $request->name;
            $city->state = $request->state ?? '';
            $city->description = $request->description ?? '';
            $city->country = $request->country ?? '';
            $city->meta_title = $request->meta_title ?? '';
            $city->meta_description = $request->meta_description ?? '';
            $city->meta_keywords = $request->meta_keywords ?? '';
            $city->fb_title = $request->facebook_meta_title ?? '';
            $city->fb_description = $request->facebook_meta_description ?? '';
            $city->twitter_title = $request->twitter_meta_title ?? '';
            $city->twitter_description = $request->twitter_meta_description ?? '';
            $city->json_ld_code = $request->json_ld_code ?? '';
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move(public_path('uploads/cities/'), $filename);
                $city->image = $filename;
            }
            if ($request->hasFile('facebook_meta_image')) {
                $fb_image = $request->file('facebook_meta_image');
                $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
                $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
                $destinationPath2 = public_path('uploads/cities/');
                $fb_image->move($destinationPath2, $fbfile);
                $city->fb_image = $fbfile;
            }
            if ($request->hasFile('twitter_meta_image')) {
                $tw_image = $request->file('twitter_meta_image');
                $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
                $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
                $destinationPath3 = public_path('uploads/cities/');
                $tw_image->move($destinationPath3, $twfile);
                $city->twitter_image = $twfile;
            }
            $query = $city->save();
            if ($query) {
                return response()->json(['msg' => 'success', 'response' => 'City updated successfully.']);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'City not found.']);
        }
    }
    public function delete(Request $request)
    {
        $city = City::find($request->id);
        if (!empty($city)) {
            $properties = Property::where('city', $city->name)->count();
            $neighborhoods = Neighborhood::where('city_id', $city->id)->count();
            if ($properties > 0 || $neighborhoods > 0) {
                return response()->json(['msg' => 'error', 'response' => 'City cannot be deleted. It is being used in property listings or neighborhoods.']);
            }
            if (!empty($city->image)) {
                $file_path = public_path() . '/uploads/cities/' . $city->image;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $city->delete();
            return response()->json(['msg' => 'success', 'response' => 'City deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'City not found.']);
        }
    }
}
