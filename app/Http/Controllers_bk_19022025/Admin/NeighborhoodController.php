<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Neighborhood;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;

class NeighborhoodController extends Controller
{
    public function index(Request $request)
    {
        $query = Neighborhood::query();
        // $search_type = $request->input('search_type');
        $search_query = $request->input('search_query');
        if (($request->has('search_query') && !empty($search_query))) {
            $query->where(function ($query) use ($search_query) {
                $query->where('title', 'like', '%' . $search_query . '%')
                    ->orWhere('code', 'like', '%' . $search_query . '%')
                    ->orWhere('zip', 'like', '%' . $search_query . '%')
                    ->orWhere('country', 'like', '%' . $search_query . '%')
                    ->orWhere('state', 'like', '%' . $search_query . '%')
                    ->orWhere('city', 'like', '%' . $search_query . '%');
            });
        }
        $data['neighborhoods'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/neighborhoods/manage_neighborhoods', $data);
    }

    public function add()
    {
        $cities = City::all();
        return view('admin/neighborhoods/add_neighborhood', compact('cities'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'banner' => 'required',
            'zip' => 'required',
            'city' => 'required',
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

        // dd($request->all());
        $slug = $request->slug;
        $city = City::where('id', $request->city)->first();
        $neighborhood = new Neighborhood();
        $neighborhood->title = $request->title;
        if ($request->slug == null || $request->slug == '') {
            $slug = correctSlug($request->title, 'neighborhoods');
        }
        $neighborhood->slug = $slug;
        $neighborhood->code = NHCodes($request->title, $city->state, $city->country);
        $neighborhood->zip = $request->zip;
        $neighborhood->country = $city->country ?? '';
        $neighborhood->state = $city->state ?? '';
        $neighborhood->city_id = $city->id;
        $neighborhood->amenity_title1 =  '';
        $neighborhood->amenity_title2 =  '';
        $neighborhood->amenity_title3 =  '';
        $neighborhood->amenity_desc1 =   '';
        $neighborhood->amenity_desc2 =  '';
        $neighborhood->amenity_desc3 =  '';
        $neighborhood->images = json_encode([]);
        $neighborhood->latitude = $request->latitude;
        $neighborhood->longitude = $request->longitude;
        $neighborhood->description = $request->description ?? '';
        $neighborhood->meta_title = $request->meta_title ?? '';
        $neighborhood->meta_description = $request->meta_description ?? '';
        $neighborhood->meta_keywords = $request->meta_keywords ?? '';
        $neighborhood->fb_title = $request->facebook_meta_title ?? '';
        $neighborhood->fb_description = $request->facebook_meta_description ?? '';
        $neighborhood->twitter_title = $request->twitter_meta_title ?? '';
        $neighborhood->twitter_description = $request->twitter_meta_description ?? '';
        $neighborhood->json_ld_code = $request->json_ld_code ?? '';

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            $filename = $neighborhood->code . time() . '.' . $extension;
            $file->move(public_path('uploads/neighborhoods/'), $filename);
            $neighborhood->banner = $filename;
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('uploads/neighborhoods/');
            $fb_image->move($destinationPath2, $fbfile);
            $neighborhood->fb_image = $fbfile;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads/neighborhoods/');
            $tw_image->move($destinationPath3, $twfile);
            $neighborhood->twitter_image = $twfile;
        }
        $query = $neighborhood->save();
        if ($query) {
            return response()->json(['msg' => 'success', 'response' => 'Community added successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
        }
    }

    public function show($id)
    {

        $neighborhood = Neighborhood::where('id', $id)->first();
        if (!empty($neighborhood)) {
            $cities = City::all();
            $images = [];
            if (!empty($neighborhood->images)) {
                $images = json_decode($neighborhood->images);
                foreach ($images as $key => $image) {
                    $images[$key] = asset('uploads/neighborhoods/' . $image);
                }
            }
            $images_array = json_encode($images);
            $neighborhood->images = $images;
            return view('admin/neighborhoods/edit_neighborhood', ['neighborhood' => $neighborhood, 'cities' => $cities, 'images_array' => $images_array]);
        } else {
            return back()->with('error', 'Community not found');
        }
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'facebook_meta_title' => 'required',
            'facebook_meta_description' => 'required',
            'twitter_meta_title' => 'required',
            'twitter_meta_description' => 'required',
            'json_ld_code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $neighborhood = Neighborhood::where('id', $request->id)->first();
        if (empty($neighborhood)) {
            return back()->with('error', 'Community not found');
        }
        $city = City::where('id', $request->city)->first();
        
        if ($request->title != $neighborhood->title) {
            $neighborhood->slug = correctSlug($request->title, 'neighborhoods');
        } else {
            $neighborhood->slug = $request->slug;
        }
        $neighborhood->title = $request->title;
        $neighborhood->code = NHCodes($request->title, $city->state, $city->country);
        $neighborhood->zip = $request->zip;
        $neighborhood->country = $city->country ?? '';
        $neighborhood->state = $city->state ?? '';
        $neighborhood->city_id = $city->id;
        $neighborhood->amenity_title1 = '';
        $neighborhood->amenity_title2 = '';
        $neighborhood->amenity_title3 = '';
        $neighborhood->amenity_desc1 = '';
        $neighborhood->amenity_desc2 = '';
        $neighborhood->amenity_desc3 = '';
        $neighborhood->images = json_encode([]);
        $neighborhood->latitude = $request->latitude;
        $neighborhood->longitude = $request->longitude;
        $neighborhood->description = $request->description ?? '';
        $neighborhood->meta_title = $request->meta_title ?? '';
        $neighborhood->meta_description = $request->meta_description ?? '';
        $neighborhood->meta_keywords = $request->meta_keywords ?? '';
        $neighborhood->fb_title = $request->facebook_meta_title ?? '';
        $neighborhood->fb_description = $request->facebook_meta_description ?? '';
        $neighborhood->twitter_title = $request->twitter_meta_title ?? '';
        $neighborhood->twitter_description = $request->twitter_meta_description ?? '';
        $neighborhood->json_ld_code = $request->json_ld_code ?? '';
        // $json_ld_code = json_decode($neighborhood->json_ld_code);

        // // Update the existing @id field
        // $json_ld_code->mainEntityOfPage->{'@id'} = 'https://buyahouseinrosarito.com/community/' . $neighborhood->slug;


        // // Encode with JSON_UNESCAPED_SLASHES for consistent formatting
        // $neighborhood->json_ld_code = json_encode($json_ld_code, JSON_UNESCAPED_SLASHES);
        if ($request->hasFile('banner')) {
            $file_path = public_path('uploads/neighborhoods/' . $neighborhood->banner);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            $filename = $neighborhood->code . time() . '.' . $extension;
            $file->move(public_path('uploads/neighborhoods/'), $filename);
            $neighborhood->banner = $filename;
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('uploads/neighborhoods/');
            $fb_image->move($destinationPath2, $fbfile);
            $neighborhood->fb_image = $fbfile;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads/neighborhoods/');
            $tw_image->move($destinationPath3, $twfile);
            $neighborhood->twitter_image = $twfile;
        }
        $query = $neighborhood->save();
        if ($query) {
            return response()->json(['msg' => 'success', 'response' => 'Community updated successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
        }
    }
    public function delete(Request $request)
    {
        $neighborhood = Neighborhood::where('id', $request->id)->first();
        if (!empty($neighborhood)) {
            $properties = Property::where('neighborhood_id', $neighborhood->id)->count();
            if ($properties > 0) {
                return response()->json(['msg' => 'error', 'response' => 'Community cannot be deleted because it has property listings associated with it.']);
            }
            if (!empty($neighborhood->banner)) {
                $file_path = public_path('uploads/neighborhoods/' . $neighborhood->banner);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                if (!empty($neighborhood->amenity_icon1)) {
                    $file_path = public_path('uploads/neighborhoods/' . $neighborhood->amenity_icon1);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                if (!empty($neighborhood->amenity_icon2)) {
                    $file_path = public_path('uploads/neighborhoods/' . $neighborhood->amenity_icon2);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                if (!empty($neighborhood->amenity_icon3)) {
                    $file_path = public_path('uploads/neighborhoods/' . $neighborhood->amenity_icon3);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                if (!empty($neighborhood->images)) {
                    $images = json_decode($neighborhood->images);
                    foreach ($images as $image) {
                        $file_path = public_path('uploads/neighborhoods/' . $image);
                        if (file_exists($file_path)) {
                            unlink($file_path);
                        }
                    }
                }
            }
            $query = Neighborhood::where('id', $request->id)->delete();
            if ($query) {
                return response()->json(['msg' => 'success', 'response' => 'Community deleted successfully.']);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Community not found.']);
        }
    }

    public function deleteImage(Request $request)
    {
        $url = $request->url;
        $parsedUrl = parse_url($url, PHP_URL_PATH);
        $filename = basename($parsedUrl);
        $neighborhood = Neighborhood::where('id', $request->id)->first();

        if (!empty($neighborhood)) {
            $images = json_decode($neighborhood->images);
            $key = array_search($filename, $images);
            if ($key !== false) {
                unset($images[$key]);
                $images = array_values($images);
                $neighborhood->images = json_encode($images);
                $query = $neighborhood->save();
                if ($query) {
                    $file_path = public_path('uploads/neighborhoods/' . $filename);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
                } else {
                    return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
                }
            } else {
                // just delete the image from the folder
                $file_path = public_path('uploads/neighborhoods/' . $filename);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
            }
        } else {
            $file_path = public_path('uploads/neighborhoods/' . $filename);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
        }
    }
    public function imageManagement(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $image_name = rand(1, 999) . time() . '.' . $file->getClientOriginalExtension();
            if ($file->move(public_path('uploads/neighborhoods'), $image_name)) {
                return response()->json([
                    'status' => 'success',
                    'image' => $image_name,
                    'image_url' => asset('uploads/neighborhoods/' . $image_name)
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Image could not be uploaded.'
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No files uploaded.'
            ], 400);
        }
    }

    public function newSlug(Request $request)
    {
        $table = $request->table ?? '';
        $title = $request->title ?? '';
        if ($request->id == null || $request->id == '' || !$request->id) {
            if ($title == null || $title == '') {
                return response()->json(['msg' => 'success', 'response' => ''], 200);
            }
            $slug = correctSlug($title, $table);
            if ($slug) {
                return response()->json(['msg' => 'success', 'response' => $slug], 200);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Something went wrong.'], 400);
            }
        } else {
            $id = $request->id;
            $title = $request->title;
            $table = $request->table;
        }
    }
}
