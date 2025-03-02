<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Feature;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyType;
use App\Models\Types;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\SEO;

class HomepageController extends Controller
{
    public function index()
    {
        // SEO
        $page = SEO::where('page_name', 'home')->first();
        $page->fb_image = asset('assets/images/' . $page->fb_image);
        $page->twitter_image = asset('assets/images/' . $page->twitter_image);

        // Types
        $types = Types::whereHas('propertyTypes')->get();
        foreach ($types as $type) {
            $type->banner = asset('uploads/types/' . $type->banner);
            $type->property_count = PropertyType::where('type_id', $type->id)->count();
        }

        // Properties
        $properties = Property::where('listing_status', 1)->orWhere('listing_status', 2)->where('is_featured', 1)->orWhere('is_featured', 2)->orderBy('views', 'desc')->limit(10)->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }

        // Cities
        $cities = City::select('id', 'name', 'slug', 'state', 'country', 'image')
        ->whereHas('properties')
        ->withCount('properties')
        ->get();
        foreach ($cities as $city) {
            $city->image = asset('uploads/cities/' . $city->image);
        }

        // Blogs
        $latestBlogs = Blogs::where('status', 1)
        ->where('disable_crawl', 0)
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
        foreach ($latestBlogs as $blog) {
            $blog->featured_image = asset('assets/images/' . $blog->featured_image);
            $blog->category = $blog->category->title ?? '';
        }

        // Comunities
        $comunities = Neighborhood::all();
        foreach ($comunities as $comunity) {
            $comunity->city = $comunity->city->name;
            $comunity->banner = asset('uploads/neighborhoods/' . $comunity->banner);
            $comunity->fb_image = asset('uploads/neighborhoods/' . $comunity->fb_image);
            $comunity->twitter_image = asset('uploads/neighborhoods/' . $comunity->twitter_image);
            $comunity->property_count = Property::where('neighborhood_id', $comunity->id)->count();
        }

        // Features

        $features = Feature::all();
        foreach ($features as $feature) {
            $feature->type = mapfeaturetype($feature->type);
            $feature->property_count = PropertyFeature::where('feature_id', $feature->id)->count();
        }

        return view('homepage', compact('types', 'properties', 'cities', 'latestBlogs', 'page', 'comunities', 'features'));
    }

    public function feature_mapping($features, $property_features)
    {
        foreach ($features as $feature) {
            $found = false;
            foreach ($property_features as $property_feature) {
                if ($property_feature->feature_id == $feature->id) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $features = $features->except($feature->id);
            }
        }
        return $features;
    }

    public function refine($property)
    {

        $property->banner = asset('uploads/properties/' . $property->banner);
        $gallery = json_decode($property->gallery);
        foreach ($gallery as $key => $image) {
            $gallery[$key] = asset('uploads/properties/' . $image);
        }
        $property->gallery = $gallery;
        $files = [];
        if ($property->files != null && $property->files != '') {
            $files = json_decode($property->files);
            foreach ($files as $key => $file) {
                $files[$key] = [
                    'name' => $file,
                    'url' => asset('uploads/properties/' . $file)
                ];
            }
        }
        $property->files = $files;
        $property->agent = $property->agent;
        $property->neighborhood = $property->neighborhood;
        $property->neighborhood->banner = asset('uploads/neighborhoods/' . $property->neighborhood->banner);
        $property->fb_image = asset('uploads/properties/' . $property->fb_image);
        $property->twitter_image = asset('uploads/properties/' . $property->twitter_image);
        unset($property->neighborhood->map);
        unset($property->neighborhood->images);
        unset($property->neighborhood->description);
        $property->development_level = developmentlvl($property->dev_lvl);
        unset($property->map);
        unset($property->neighborhood_id);
        unset($property->dev_lvl);
        if ($property->listing_type == 1) {
            $property->listing_type = 'buy';
            unset($property->rent_cycle);
            unset($property->date_available);
        } else if ($property->listing_type == 2) {
            $property->listing_type = 'rent';
            unset($property->property_tax);
            unset($property->hoa_fees);
        }
        if ($property->is_featured == 2) {
            $property->is_featured = true;
        } elseif ($property->is_featured == 1) {
            $property->is_featured = false;
        }


        $property->listing_status = mapListingStatus($property->listing_status);
        $property->rent_cycle = mapRentCycleAPI($property->rent_cycle);
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
        $features['interior_features'] = $this->feature_mapping($interior_features, $property_features);
        $features['exterior_finish'] = $this->feature_mapping($exterior_finish, $property_features);
        $features['featured_amenities'] = $this->feature_mapping($featured_amenities, $property_features);
        $features['appliances'] = $this->feature_mapping($appliances, $property_features);
        $features['views'] = $this->feature_mapping($views, $property_features);
        $features['heatings'] = $this->feature_mapping($heatings, $property_features);
        $features['coolings'] = $this->feature_mapping($coolings, $property_features);
        $features['roofs'] = $this->feature_mapping($roofs, $property_features);
        $features['sewer_water_systems'] = $this->feature_mapping($sewer_water_systems, $property_features);
        $features['extra_features'] = $this->feature_mapping($extra_features, $property_features);
        $property->features = $features;
        $types = Types::all();
        $property_types = PropertyType::where('property_id', $property->id)->get();
        $property_types = $property_types->map(function ($property_type) use ($types) {
            return $types->where('id', $property_type->type_id)->first();
        });
        $property->types = $property_types;
        // $related_listings = 4 properties of same type and area
        return $property;
    }
}
