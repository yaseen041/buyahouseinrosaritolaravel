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

class NeighborhoodsController extends Controller
{
    public function index()
    {
        $neighborhoods = Neighborhood::all();
        foreach ($neighborhoods as $neighborhood) {
            $neighborhood->city = $neighborhood->city->name;
            $neighborhood->banner = asset('uploads/neighborhoods/' . $neighborhood->banner);
            $neighborhood->fb_image = asset('uploads/neighborhoods/' . $neighborhood->fb_image);
            $neighborhood->twitter_image = asset('uploads/neighborhoods/' . $neighborhood->twitter_image);
            // $images = json_decode($neighborhood->images);
            // $neighborhood_images = [];
            // foreach ($images as $image) {
            //     $neighborhood_images[] = asset('uploads/neighborhoods/' . $image);
            // }
            // $neighborhood->images = $neighborhood_images;
            $neighborhood->property_count = Property::where('neighborhood_id', $neighborhood->id)->count();
        }
        return response()->json(['message' => 'Neighborhoods retrieved successfully.', 'data' => $neighborhoods], 200);
    }
    public function show($slug)
    {
        $neighborhood = Neighborhood::where('slug', $slug)->first();
        $neighborhood->fb_image = asset('uploads/neighborhoods/' . $neighborhood->fb_image);
        $neighborhood->twitter_image = asset('uploads/neighborhoods/' . $neighborhood->twitter_image);
        if ($neighborhood) {

            $city_id = $neighborhood->city->id;
            $neighborhood->banner = asset('uploads/neighborhoods/' . $neighborhood->banner);
            $otherneighborhoods = Neighborhood::where('city_id', $city_id)->where('id', '!=', $neighborhood->id)->get();
            $types = Types::all();

            // Prepare an array to store properties grouped by type
            $propertiesByType = [];
            foreach ($types as $type) {
                $totalCount = Property::where('neighborhood_id',  $neighborhood->id)
                    ->whereHas('propertyTypes', function ($query) use ($type) {
                        $query->where('type_id', $type->id);
                    })
                    ->count();
                // Fetch the first 6 properties for each type, sorted by created_at descending
                $properties = Property::where('neighborhood_id', $neighborhood->id)
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
                'neighborhood' => $neighborhood,
                'related_neighborhoods' => $otherneighborhoods,
                'properties_by_type' => $propertiesByType,
            ];

            return response()->json(['message' => 'Neighborhood retrieved successfully.', 'response' => $response], 200);
        } else {
            return response()->json(['message' => 'Neighborhood not found.'], 404);
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
}
