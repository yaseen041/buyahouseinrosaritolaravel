<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Feature;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyType;
use App\Models\Types;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        foreach ($cities as $city) {
            $city->image = asset('uploads/cities/' . $city->image);
            $city->properties_count = Property::where('city', $city->name)->count();
        }
        return response()->json(['message' => 'Cities retrieved successfully', 'data' => $cities], 200);
    }

    public function show($slug)
    {
        $city = City::where('slug', $slug)->first();
        $city->image = asset('uploads/cities/' . $city->image);
        $city->fb_image = asset('uploads/cities/' . $city->fb_image);
        $city->twitter_image = asset('uploads/cities/' . $city->twitter_image);
        if ($city) {
            $neighborhoods = Neighborhood::where('city_id', $city->id)->get();
            $types = Types::all();

            // Prepare an array to store properties grouped by type
            $propertiesByType = [];

            foreach ($types as $type) {
                $totalCount = Property::where('city', $city->name)
                    ->whereHas('propertyTypes', function ($query) use ($type) {
                        $query->where('type_id', $type->id);
                    })
                    ->count();
                // Fetch the first 6 properties for each type, sorted by created_at descending
                $properties = Property::where('city', $city->name)
                    ->whereHas('propertyTypes', function ($query) use ($type) {
                        $query->where('type_id', $type->id);
                    })
                    ->orderBy('created_at', 'desc')
                    ->take(6)
                    ->get();

                // Only include types with properties
                if ($properties->isNotEmpty()) {
                    foreach ($properties as $property) {
                        $this->refine($property);
                    }
                    $propertiesByType[$type->title] = [
                        'properties' => $properties,
                        'has_more' => $totalCount > 6, // Set flag based on total count
                    ];
                }
            }

            $response = [
                'city' => $city,
                'neighborhoods' => $neighborhoods,
                'properties_by_type' => $propertiesByType,
            ];
            // dd($propertiesByType);
            return response()->json(['message' => 'City retrieved successfully', 'response' => $response], 200);
        } else {
            return response()->json(['message' => 'City not found'], 404);
        }
    }
    public function mostListingsCountCities()
    {
        $cities = City::all();
        $citiesWithMostListings = [];
        foreach ($cities as $city) {
            $city->image = asset('uploads/cities/' . $city->image);
            $city->properties_count = Property::where('city', $city->name)->count();
            $citiesWithMostListings[] = $city;
        }
        usort($citiesWithMostListings, function ($a, $b) {
            return $b->properties_count - $a->properties_count;
        });
        $citiesWithMostListings = array_slice($citiesWithMostListings, 0, 6);
        return response()->json(['message' => 'Cities retrieved successfully', 'data' => $citiesWithMostListings], 200);
    }
    public function search(Request $request)
    {
        $cityId = $request->city;
        $typeId = $request->type;

        if (!$cityId || !$typeId) {
            return response()->json(['message' => 'City ID and Type ID are required'], 400);
        }

        $city = City::find($cityId);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        $type = Types::find($typeId);
        if (!$type) {
            return response()->json(['message' => 'Type not found'], 404);
        }

        $properties = Property::where('city', $city->name)
            ->whereHas('propertyTypes', function ($query) use ($typeId) {
                $query->where('type_id', $typeId);
            })
            ->with(['neighborhood', 'propertyTypes.type'])
            ->get();

        if ($properties->count() > 0) {
            return response()->json(['message' => 'Properties retrieved successfully', 'data' => $properties], 200);
        } else {
            return response()->json(['message' => 'No properties found'], 404);
        }
    }
    public function refine($property)
    {

        $property->banner = asset('uploads/properties/' . $property->banner);
        $gallery = json_decode($property->gallery);
        foreach ($gallery as $key => $image) {
            $gallery[$key] = asset('uploads/properties/' . $image);
        }
        $property->gallery = $gallery;
        if ($property->is_featured == 2) {
            $property->is_featured = true;
        } elseif ($property->is_featured == 1) {
            $property->is_featured = false;
        }
        $property->listing_status = mapListingStatus($property->listing_status);
        $property->listing_type = $property->listing_type == 1 ? 'buy' : 'rent';
        $property->rent_cycle = mapRentCycleAPI($property->rent_cycle);
        return $property;
    }
    public function neighborhoods($city_id)
    {
        $city = City::find($city_id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        $neighborhoods = $city->neighborhoods;
        return response()->json(['message' => 'Neighborhoods retrieved successfully', 'data' => $neighborhoods], 200);
    }
}
