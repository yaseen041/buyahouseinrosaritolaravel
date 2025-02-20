<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyType;
use App\Models\Feature;
use App\Models\Types;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Response;

class PropertyListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();
        // $search_type = $request->input('search_type');
        $search_query = $request->input('search_query');
        if (($request->has('search_query') && !empty($search_query))) {
            $query->where(function ($query) use ($search_query) {
                $query->where('title', 'like', '%' . $search_query . '%')
                ->orWhere('code', 'like', '%' . $search_query . '%')
                ->orWhere('address', 'like', '%' . $search_query . '%')
                ->orWhere('country', 'like', '%' . $search_query . '%')
                ->orWhere('state', 'like', '%' . $search_query . '%')
                ->orWhere('city', 'like', '%' . $search_query . '%');
            });
        }
        $data['properties'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/property/manage_properties', $data);
    }

    public function add()
    {
        $data['interior_features'] = Feature::where('type', 1)->get();
        $data['exterior_finish'] = Feature::where('type', 2)->get();
        $data['featured_amenities'] = Feature::where('type', 3)->get();
        $data['appliances'] = Feature::where('type', 4)->get();
        $data['views'] = Feature::where('type', 5)->get();
        $data['heatings'] = Feature::where('type', 6)->get();
        $data['coolings'] = Feature::where('type', 7)->get();
        $data['roofs'] = Feature::where('type', 8)->get();
        $data['sewer_water_systems'] = Feature::where('type', 9)->get();
        $data['extra_features'] = Feature::where('type', 10)->get();
        $data['types'] = Types::all();
        $data['neighborhoods'] = Neighborhood::all();
        $data['agents'] = Agents::all();
        // dd($data);
        return view('admin/property/add_properties', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->date_available != null || $request->date_available != '') {
            $date_available = DateTime::createFromFormat('d/m/Y', $request->input('date_available'))->format('Y-m-d H:i:s.u');
        } else {
            $date_available = Carbon::today()->format('Y-m-d H:i:s.u');
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'property_url' => 'required',
            'listing_type' => 'required',
            'listing_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'price' => 'required',
            'neighborhood' => 'required',
            'short_description' => 'required',
            'address' => 'required',
            'size' => 'required',
            'parking_spaces' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'year_built' => 'required',
            'agent' => 'required',
            'building_type' => 'nullable',
            'source_link' => 'nullable',
            'listing_date' => 'nullable',
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
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $features = Feature::all();
        $feature_slugs = [];
        foreach ($features as $feature) {
            if ($request->has($feature->slug)) {
                $feature_slugs[] = $feature->slug;
            }
        }
        $types = Types::all();
        $type_slugs = [];
        foreach ($types as $type) {
            if ($request->has($type->slug)) {
                $type_slugs[] = $type->slug;
            }
        }
        $gla = $request->GLA ?? 0;
        if ($request->listing_type == '2') {
            $avg_cost_per_sqft = 0;
            $avg_cost_per_mt = 0;
        } else {
            $avg_cost_per_sqft = round($request->price / $request->size, 2);
            $avg_cost_per_mt = round($request->price / ($request->size * 0.092903), 2);
        }
        $neighborhood = Neighborhood::where('id', $request->neighborhood)->first();
        $property = new Property();
        $property->code = PropertyCode($neighborhood->code, $request->listing_type);
        $property->title = $request->title;

        // $slug = $request->slug;
        // if ($request->slug == null || $request->slug == '') {
        //     $slug = correctSlug($request->title, 'properties');
        // }
        $property->slug = $request->property_url;
        $property->price = $request->price;
        $property->price_per_sft = round(($request->price / $request->size), 2);
        $property->neighborhood_id  = $neighborhood->id;
        $property->listing_status = $request->listing_status;
        $property->size  = $request->size;
        $property->size_mt = round($request->size * 0.092903, 2);
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms  = $request->bathrooms;
        $property->parking_spaces = $request->parking_spaces;
        $property->description = $request->description ?? '';
        $property->short_description = $request->short_description ?? '';
        $property->address = $request->address;
        $property->country = $neighborhood->country;
        $property->state = $neighborhood->state;
        $property->city = $neighborhood->city->name;
        $property->city_id = $neighborhood->city_id;
        $property->dev_lvl = $request->dev_lvl;
        $property->year_built = $request->year_built;
        $property->listing_type = $request->listing_type;
        $property->property_tax  = $request->property_tax ?? '';
        $property->hoa_fees  = $request->hoa_fees ?? '';
        $property->rent_cycle  = $request->rent_cycle ?? '';
        $property->date_available  = $date_available;
        $property->gallery = $request->gallery;
        $property->lattitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->agent = $request->agent;
        $property->building_type = $request->building_type;
        $property->source_link = $request->source_link;
        $property->listing_date = $request->listing_date;
        $property->GLA = $gla;
        $property->GLA_mt = round($gla * 0.092903, 2);
        $property->avg_ft = $avg_cost_per_sqft;
        $property->avg_mt = $avg_cost_per_mt;
        $property->meta_title = $request->meta_title ?? '';
        $property->meta_description = $request->meta_description ?? '';
        $property->meta_keywords = $request->meta_keywords ?? '';
        $property->fb_title = $request->facebook_meta_title ?? '';
        $property->fb_description = $request->facebook_meta_description ?? '';
        $property->twitter_title = $request->twitter_meta_title ?? '';
        $property->twitter_description = $request->twitter_meta_description ?? '';
        $property->json_ld_code = $request->json_ld_code ?? '';
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $image_name = $property->code . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/properties'), $image_name);
            $property->banner = $image_name;
        }
        if ($request->hasFile('pdfs')) {
            $files = $request->file('pdfs');
            $file_names = [];

            foreach ($files as $file) {
                // Ensure that the file is uploaded and handle naming
                $file_name = $property->code . time() . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/properties'), $file_name);
                $file_names[] = $file_name;
            }

            // Save the file names as JSON
            $property->files = json_encode($file_names);
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('uploads/properties/');
            $fb_image->move($destinationPath2, $fbfile);
            $property->fb_image = $fbfile;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads/properties/');
            $tw_image->move($destinationPath3, $twfile);
            $property->twitter_image = $twfile;
        }
        $query = $property->save();
        if ($query) {
            $property_id = $property->id;
            foreach ($feature_slugs as $feature_slug) {
                $feature = Feature::where('slug', $feature_slug)->first();
                $property_feature = new PropertyFeature();
                $property_feature->property_id = $property_id;
                $property_feature->feature_id = $feature->id;
                $property_feature->save();
            }
            foreach ($type_slugs as $type_slug) {
                $type = Types::where('slug', $type_slug)->first();
                $property_type = new PropertyType();
                $property_type->property_id = $property_id;
                $property_type->type_id = $type->id;
                $property_type->save();
            }
            return response()->json(['msg' => 'success', 'response' => 'Property Listing added successfully']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong. Couldn\'t add property listing.']);
        }
    }
    public function show($id)
    {
        $property  = Property::where('id', $id)->first();
        if ($property) {
            $property->date_available = Carbon::parse($property->date_available)->format('Y-m-d');
            // Fetching all Features from features table according to their static types
            $interior_features = Feature::where('type', 1)->get();
            $exterior_finish = Feature::where('type', 2)->get();
            $featured_amenities = Feature::where('type', 3)->get();
            $appliances = Feature::where('type', 4)->get();
            $views = Feature::where('type', 5)->get();
            $heatings = Feature::where('type', 6)->get();
            $coolings = Feature::where('type', 7)->get();
            $roofs = Feature::where('type', 8)->get();
            $sewer_water_systems = Feature::where('type', 9)->get();
            $extra_features = Feature::where('type', 10)->get();
            $property_features = PropertyFeature::where('property_id', $property->id)->get();
            foreach ($interior_features as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($exterior_finish as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($featured_amenities as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($appliances as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($views as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($heatings as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($coolings as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($roofs as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($sewer_water_systems as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            foreach ($extra_features as $feature) {
                $feature->show = "1";
                foreach ($property_features as $property_feature) {
                    if ($feature->id == $property_feature->feature_id) {
                        $feature->show = "2";
                    }
                }
            }
            $property_types = PropertyType::where('property_id', $property->id)->get();
            $types = Types::all();
            foreach ($types as $type) {
                $type->show = "1";
                foreach ($property_types as $property_type) {
                    if ($type->id == $property_type->type_id) {
                        $type->show = "2";
                    }
                }
            }
            $files = [];
            if (!empty($property->files && $property->files != null)) {
                $files = json_decode($property->files);
                foreach ($files as $key => $file) {
                    $files[$key] = [
                        'name' => $file,
                        'url' => asset('uploads/properties/' . $file)
                    ];
                }
            } else {
                $files = [];
            }
            $agents = Agents::all();
            // dd($types);
            $data['property'] = $property;
            $data['interior_features'] = $interior_features;
            $data['exterior_finish'] = $exterior_finish;
            $data['featured_amenities'] = $featured_amenities;
            $data['appliances'] = $appliances;
            $data['views'] = $views;
            $data['heatings'] = $heatings;
            $data['coolings'] = $coolings;
            $data['roofs'] = $roofs;
            $data['sewer_water_systems'] = $sewer_water_systems;
            $data['extra_features'] = $extra_features;
            $data['types'] = $types;
            $data['neighborhoods'] = Neighborhood::all();
            $data['agents'] = $agents;
            $data['files'] = $files;
            $data['prop_neighborhood'] = Neighborhood::where('id', $property->neighborhood_id)->get();
            $gallery = [];
            if (!empty($property->gallery && $property->gallery != null)) {
                $images = json_decode($property->gallery);
                foreach ($images as $key => $image) {
                    $images[$key] = asset('uploads/properties/' . $image);
                }
            } else {
                $images = [];
            }
            $data['gallery_array'] = json_encode($images);
            $data['galleries'] = $images;
            return view('admin/property/edit_properties', $data);
        } else {
            return redirect()->back()->with('error', 'Property Listing not found');
        }
    }

    public function update(Request $request)
    {
        $gallery = json_decode($request->gallery);
        foreach ($gallery as $key => $url) {
            $parsedUrl = parse_url($url, PHP_URL_PATH);
            $filename = basename($parsedUrl);
            $gallery[$key] = $filename;
        }
        if ($request->date_available != null || $request->date_available != '') {
            $date_available = Carbon::parse($request->input('date_available'))->format('Y-m-d H:i:s.u');
        } else {
            $date_available = Carbon::today()->format('Y-m-d H:i:s.u');
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'property_url' => 'required',
            'listing_type' => 'required',
            'listing_status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'price' => 'required',
            'neighborhood' => 'required',
            'short_description' => 'required',
            'address' => 'required',
            'size' => 'required',
            'parking_spaces' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'year_built' => 'required',
            'agent' => 'required',
            'building_type' => 'nullable',
            'source_link' => 'nullable',
            'listing_date' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'facebook_meta_title' => 'nullable',
            'facebook_meta_description' => 'nullable',
            'twitter_meta_title' => 'nullable',
            'twitter_meta_description' => 'nullable',
            'json_ld_code' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }
        $features = Feature::all();
        $feature_slugs = [];
        foreach ($features as $feature) {
            if ($request->has($feature->slug)) {
                $feature_slugs[] = $feature->slug;
            }
        }
        $types = Types::all();
        $type_slugs = [];
        foreach ($types as $type) {
            if ($request->has($type->slug)) {
                $type_slugs[] = $type->slug;
            }
        }
        $gla = $request->GLA ?? 0;
        if ($request->listing_type == '2') {
            $avg_cost_per_sqft = 0;
            $avg_cost_per_mt = 0;
        } else {
            $avg_cost_per_sqft = round($request->price / $request->size, 2);
            $avg_cost_per_mt = round($request->price / ($request->size * 0.092903), 2);
        }
        $neighborhood = Neighborhood::where('id', $request->neighborhood)->first();
        $property = Property::where('id', $request->id)->first();
        $property->code = PropertyCode($neighborhood->code, $request->listing_type);
        // if ($request->title != $property->title) {
        //     $property->slug = correctSlug($request->title, 'properties');
        // } else {
        //     $property->slug = $request->slug;
        // }

        $property->slug = $request->property_url;
        $property->title = $request->title;
        $property->price = $request->price;
        $property->price_per_sft = round(($request->price / $request->size), 2);
        $property->neighborhood_id  = $neighborhood->id;
        $property->listing_status = $request->listing_status;
        $property->size  = $request->size;
        $property->size_mt = round($request->size * 0.092903, 2);
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms  = $request->bathrooms;
        $property->parking_spaces = $request->parking_spaces;
        $property->description = $request->description ?? '';
        $property->short_description = $request->short_description ?? '';
        $property->address = $request->address;
        $property->country = $neighborhood->country;
        $property->state = $neighborhood->state;
        $property->city = $neighborhood->city->name;
        $property->city_id = $neighborhood->city_id;
        $property->dev_lvl = $request->dev_lvl;
        $property->year_built = $request->year_built;
        $property->listing_type = $request->listing_type;
        $property->property_tax  = $request->property_tax ?? '';
        $property->hoa_fees  = $request->hoa_fees ?? '';
        $property->rent_cycle  = $request->rent_cycle ?? '';
        $property->date_available  = $date_available;
        $property->gallery = $gallery;
        $property->lattitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->agent = $request->agent;
        $property->building_type = $request->building_type;
        $property->source_link = $request->source_link;
        $property->listing_date = $request->listing_date;
        $property->GLA = $gla;
        $property->GLA_mt = round($gla * 0.092903, 2);
        $property->avg_ft = $avg_cost_per_sqft;
        $property->avg_mt = $avg_cost_per_mt;
        $neighborhood->meta_title = $request->meta_title ?? '';
        $neighborhood->meta_description = $request->meta_description ?? '';
        $neighborhood->meta_keywords = $request->meta_keywords ?? '';
        $neighborhood->fb_title = $request->facebook_meta_title ?? '';
        $neighborhood->fb_description = $request->facebook_meta_description ?? '';
        $neighborhood->twitter_title = $request->twitter_meta_title ?? '';
        $neighborhood->twitter_description = $request->twitter_meta_description ?? '';
        $neighborhood->json_ld_code = $request->json_ld_code ?? '';
        // $json_ld_code = json_decode($property->json_ld_code);

        // // Update the existing @id field
        // $json_ld_code->mainEntityOfPage->{'@id'} = 'https://buyahouseinrosarito.com/property/' . $property->slug;


        // // Encode with JSON_UNESCAPED_SLASHES for consistent formatting
        // $property->json_ld_code = json_encode($json_ld_code, JSON_UNESCAPED_SLASHES);
        if ($request->hasFile('pdfs')) {
            $files = $request->file('pdfs');

            $file_names = [];
            if ($property->files != null) {
                $file_names = json_decode($property->files);
            }

            foreach ($files as $file) {
                // Ensure that the file is uploaded and handle naming
                $file_name = $property->code . time() . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/properties'), $file_name);
                $file_names[] = $file_name;
            }

            $property->files = json_encode($file_names);
        }
        if ($request->hasFile('banner')) {
            if ($property->banner != null) {
                $banner = public_path('uploads/properties/' . $property->banner);
                if (file_exists($banner)) {
                    unlink($banner);
                }
            }
            $image = $request->file('banner');
            $image_name = $property->code . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/properties'), $image_name);
            $property->banner = $image_name;
        }
        if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $fbfile = $file_name2 . '-' . time() . rand() . '.' . $fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('uploads/properties/');
            $fb_image->move($destinationPath2, $fbfile);
            $property->fb_image = $fbfile;
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $twfile = $file_name3 . '-' . time() . '.' . $tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads/properties/');
            $tw_image->move($destinationPath3, $twfile);
            $property->twitter_image = $twfile;
        }
        $query = $property->save();
        if ($query) {
            $property_features = PropertyFeature::where('property_id', $property->id)->get();
            foreach ($property_features as $property_feature) {
                $property_feature->delete();
            }
            $property_types = PropertyType::where('property_id', $property->id)->get();
            foreach ($property_types as $property_type) {
                $property_type->delete();
            }
            foreach ($feature_slugs as $feature_slug) {
                $feature = Feature::where('slug', $feature_slug)->first();
                $property_feature = new PropertyFeature();
                $property_feature->property_id = $property->id;
                $property_feature->feature_id = $feature->id;
                $property_feature->save();
            }
            foreach ($type_slugs as $type_slug) {
                $type = Types::where('slug', $type_slug)->first();
                $property_type = new PropertyType();
                $property_type->property_id = $property->id;
                $property_type->type_id = $type->id;
                $property_type->save();
            }
            return response()->json(['msg' => 'success', 'response' => 'Property Listing updated successfully']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong. Couldn\'t update property listing.']);
        }
    }

    public function delete(Request $request)
    {
        $property = Property::where('id', $request->id)->first();
        if ($property) {
            $property_features = PropertyFeature::where('property_id', $property->id)->get();
            foreach ($property_features as $property_feature) {
                $property_feature->delete();
            }
            $property_types = PropertyType::where('property_id', $property->id)->get();
            foreach ($property_types as $property_type) {
                $property_type->delete();
            }
            if ($property->banner != null) {
                $banner = public_path('uploads/properties/' . $property->banner);
                if (file_exists($banner)) {
                    unlink($banner);
                }
            }
            if ($property->gallery != null) {
                $gallery = json_decode($property->gallery);
                foreach ($gallery as $image) {
                    $gallery_image = public_path('uploads/properties/' . $image);
                    if (file_exists($gallery_image)) {
                        unlink($gallery_image);
                    }
                }
            }
            if ($property->files != null) {
                $files = json_decode($property->files);
                foreach ($files as $file) {
                    $file_path = public_path('uploads/properties/' . $file);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }
            $query = $property->delete();
            if ($query) {
                return response()->json(['msg' => 'success', 'response' => 'Property Listing deleted successfully.']);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Property Listing Could Not Be Deleted. Try Again!']);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something Went Wrong!']);
        }
    }
    public function updateFeatureStatus(Request $request)
    {
        $property = Property::where('id', $request->id)->first();
        if ($property) {
            if ($property->is_featured == 1) {
                $property->is_featured = 2;
                $query = $property->save();
                if ($query) {
                    return response()->json(['msg' => 'success', 'response' => 'Property Listing featured successully.']);
                } else {
                    return response()->json(['msg' => 'error', 'response' => 'Something Went Wrong!']);
                }
            } elseif ($property->is_featured == 2) {
                $property->is_featured = 1;
                $query = $property->save();
                if ($query) {
                    return response()->json(['msg' => 'success', 'response' => 'Property Listing unfeatured successully.']);
                } else {
                    return response()->json(['msg' => 'error', 'response' => 'Something Went Wrong!']);
                }
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something Went Wrong!']);
        }
    }

    public function imageManagement(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $image_name = rand(1, 999) . time() . '.' . $file->getClientOriginalExtension();
            if ($file->move(public_path('uploads/properties'), $image_name)) {
                return response()->json([
                    'status' => 'success',
                    'image' => $image_name,
                    'image_url' => asset('uploads/properties/' . $image_name)
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
    public function deleteImage(Request $request)
    {
        $url = $request->url;
        $parsedUrl = parse_url($url, PHP_URL_PATH);
        $filename = basename($parsedUrl);
        $property = Property::where('id', $request->id)->first();

        if (!empty($property)) {
            $gallery = json_decode($property->gallery);
            $key = array_search($filename, $gallery);
            if ($key !== false) {
                unset($gallery[$key]);
                $gallery = array_values($gallery);
                $property->gallery = json_encode($gallery);
                $query = $property->save();
                if ($query) {
                    $file_path = public_path('uploads/properties/' . $filename);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
                } else {
                    return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
                }
            } else {
                $file_path = public_path('uploads/properties/' . $filename);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
            }
        } else {
            $file_path = public_path('uploads/properties/' . $filename);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            return response()->json(['msg' => 'success', 'response' => 'Image deleted successfully.']);
        }
    }

    public function deleteFile(Request $request)
    {
        $property = Property::where('id', $request->property_id)->first();
        $filename = $request->name;
        // in $property->files remove this filename and then delete it 
        $files = json_decode($property->files, true);
        $files = array_filter($files, function ($file) use ($filename) {
            return $file !== $filename;
        });
        $files = array_values($files);
        $filePath = public_path('uploads/properties/' . $filename);
        if (file_exists($filePath)) {
            unlink($filePath); // Deletes the file from the server
        }
        $property->files = empty($files) ? null : json_encode($files);
        $query = $property->save();
        if ($query) {
            return response()->json(['msg' => 'success', 'response' => 'File deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong.']);
        }
    }
}
