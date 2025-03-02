<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Feature;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyType;
use App\Models\Types;

class PropertiesController extends Controller
{
    public function filters()
    {
        $types = Types::all();
        foreach ($types as $type) {
            unset($type->created_at);
            unset($type->updated_at);
            unset($type->status);
            unset($type->banner);
        }
        $features = Feature::all();
        foreach ($features as $feature) {
            unset($feature->created_at);
            unset($feature->updated_at);
            unset($feature->status);
            unset($feature->type);
        }
        $is_featured = [
            ['id' => 1, 'title' => 'Not Featured'],
            ['id' => 2, 'title' => 'Featured'],
        ];
        $listing_type = [
            ['id' => 1, 'title' => 'Sale'],
            ['id' => 2, 'title' => 'Rent'],
        ];
        $listing_status = [
            ['id' => 1, 'title' => 'For Sale'],
            ['id' => 2, 'title' => 'For Rent'],
            ['id' => 3, 'title' => 'Rented'],
            ['id' => 4, 'title' => 'Sale Pending'],
            ['id' => 5, 'title' => 'Sold'],
        ];
        $sorting = [
            ['id' => '1', 'title' => 'default'],
            ['id' => '2', 'title' => 'Featured'],
            ['id' => '3', 'title' => 'Most Viewed'],
            ['id' => '4', 'title' => 'Price (Low to High)'],
            ['id' => '5', 'title' => 'Price (High to Low)'],
            ['id' => '6', 'title' => 'Date (Old to New)'],
            ['id' => '7', 'title' => 'Date (New to Old)'],
        ];
        $data = [
            'is_featured' => $is_featured,
            'listing_type' => $listing_type,
            'listing_status' => $listing_status,
            'sorting' => $sorting,
            'types' => $types,
            'features' => $features,
        ];
        return response()->json(['message' => 'Filter Mapping retrieved successfully.', 'data' => $data], 200);
    }
    public function featured(Request $request)
    {
        $properties = Property::where('is_featured', 2)->orderBy('created_at', 'desc')->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Featured Properties retrieved successfully.', 'data' => $properties], 200);
    }
    public function recent(Request $request)
    {
        $properties = Property::orderBy('created_at', 'desc')->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Recent Properties retrieved successfully.', 'data' => $properties], 200);
    }
    public function recentforrent(Request $request)
    {
        $properties = Property::where('listing_status', 2)->orderBy('created_at', 'desc')->limit(6)->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Recent Properties retrieved successfully.', 'data' => $properties], 200);
    }
    public function recentforsale(Request $request)
    {
        $properties = Property::where('listing_status', 1)->orderBy('created_at', 'desc')->limit(6)->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Recent Properties retrieved successfully.', 'data' => $properties], 200);
    }
    public function bestdeals(Request $request)
    {
        //  6 with listing status 1 and 2 and is_featured 1 and 2 and maximum views
        $properties = Property::where('listing_status', 1)->orWhere('listing_status', 2)->where('is_featured', 1)->orWhere('is_featured', 2)->orderBy('views', 'desc')->limit(6)->get();
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Recent Properties retrieved successfully.', 'data' => $properties], 200);
    }
    public function show($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->views = $property->views + 1;
            $property->save();
            $property = $this->refine($property);

            $related_listings = Property::where('listing_status', $property->listing_status)->where('neighborhood_id', $property->neighborhood_id)->where('id', '!=', $property->id)->limit(4)->get();
            foreach ($related_listings as $related_listing) {
                $related_listing = $this->refine($related_listing);
            }
            $property->related_listings = $related_listings;
            return response()->json(['message' => 'Property retrieved successfully.', 'data' => $property], 200);
        } else {
            return response()->json(['message' => 'Property not found.'], 404);
        }
    }
    public function detailswithslug($slug)
    {
        $property = Property::where('slug', $slug)->first();
        if ($property) {
            $property->views = $property->views + 1;
            $property->save();
            $property = $this->refine($property);
            $related_listings = Property::where('listing_status', $property->listing_status)->where('neighborhood_id', $property->neighborhood_id)->where('id', '!=', $property->id)->limit(4)->get();
            foreach ($related_listings as $related_listing) {
                $related_listing = $this->refine($related_listing);
            }
            $property->related_listings = $related_listings;
            return response()->json(['message' => 'Property retrieved successfully.', 'data' => $property], 200);
        } else {
            return response()->json(['message' => 'Property not found.'], 404);
        }
    }
    public function all(Request $request)
    {
        $sorting = $request->sorting ?? null;
        $listing_status = $request->listing_status ?? null;
        $listing_type = $request->listing_type ?? null;
        $is_featured = $request->is_featured ?? null;
        $feature = $request->feature ?? null;
        $type = $request->type ?? null;


        $properties = Property::query();

        if ($sorting) {
            if ($sorting == 1) {
                $properties = $properties->orderBy('created_at', 'desc');
            } else if ($sorting == 2) {
                $properties = $properties->orderBy('is_featured', 'desc');
            } else if ($sorting == 3) {
                $properties = $properties->orderBy('views', 'desc');
            } else if ($sorting == 4) {
                $properties = $properties->orderBy('price'); // Ascending order
            } else if ($sorting == 5) {
                $properties = $properties->orderBy('price', 'desc'); // Descending order
            } else if ($sorting == 6) {
                $properties = $properties->orderBy('created_at'); // Ascending order
            } else if ($sorting == 7) {
                $properties = $properties->orderBy('created_at', 'desc'); // Descending order
            }
        } else {
            $properties = $properties->orderBy('created_at', 'desc');
        }

        if ($listing_status) {
            $properties = $properties->where('listing_status', $listing_status);
        }

        if ($listing_type) {
            $properties = $properties->where('listing_type', $listing_type);
        }

        if ($is_featured) {
            $properties = $properties->where('is_featured', $is_featured);
        }

        if ($feature) {
            $properties = $properties->filter(function ($property) use ($feature) {
                $property_features = PropertyFeature::where('property_id', $property->id)->get();
                $found = false;
                foreach ($property_features as $property_feature) {
                    if ($property_feature->feature_id == $feature) {
                        $found = true;
                        break;
                    }
                }
                return $found;
            });
        }

        if ($type) {
            $properties = $properties->filter(function ($property) use ($type) {
                $property_types = PropertyType::where('property_id', $property->id)->get();
                $found = false;
                foreach ($property_types as $property_type) {
                    if ($property_type->type_id == $type) {
                        $found = true;
                        break;
                    }
                }
                return $found;
            });
        }
        $total = $properties->count();
        $pages = ceil($total / 6);

        $properties = $properties->paginate(6);
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Properties retrieved successfully.', 'data' => $properties, 'records_count' => $total], 200);
    }
    public function allWithCities(Request $request)
    {

        $city_id = $request->city_id;
        $sorting = $request->sorting ?? null;
        $listing_status = $request->listing_status ?? null;
        $listing_type = $request->listing_type ?? null;
        $is_featured = $request->is_featured ?? null;
        $feature = $request->feature ?? null;
        $type = $request->type ?? null;
        $city = City::where('id', $city_id)->first();
        if (!$city) {
            return response()->json(['message' => 'City not found.'], 404);
        }
        $properties = Property::query();
        $properties = $properties->where('city', $city->name);
        if ($sorting) {
            if ($sorting == 2) {
                $properties = $properties->orderBy('is_featured', 'desc');
            } else if ($sorting == 3) {
                $properties = $properties->orderBy('views', 'desc');
            } else if ($sorting == 4) {
                $properties = $properties->orderBy('price'); // Ascending order
            } else if ($sorting == 5) {
                $properties = $properties->orderBy('price', 'desc'); // Descending order
            } else if ($sorting == 6) {
                $properties = $properties->orderBy('created_at'); // Ascending order
            } else if ($sorting == 7) {
                $properties = $properties->orderBy('created_at', 'desc'); // Descending order
            }
        } else {
            $properties = $properties->orderBy('created_at', 'desc');
        }

        $total = $properties->count();
        $pages = ceil($total / 6);

        $properties = $properties->paginate(6);
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Properties retrieved successfully.', 'data' => $properties, 'records_count' => $total], 200);
    }
    public function allWithNeighbor($id)
    {
        $neighborhood = Neighborhood::find($id);
        if (empty($neighborhood)) {
            return response()->json(['message' => 'Neighborhood not found.'], 404);
        }
        $properties = Property::where('neighborhood_id', $id)->orderBy('created_at', 'desc')->paginate(6);
        foreach ($properties as $property) {
            $this->refine($property);
        }
        return response()->json(['message' => 'Properties retrieved successfully.', 'data' => $properties], 200);
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
}
