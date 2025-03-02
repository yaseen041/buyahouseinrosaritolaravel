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
use App\Models\Agents;
class PropertiesController extends Controller
{
	public function index(Request $request)
	{
		$page = SEO::where('page_name', 'property')->first();
		$page->fb_image = asset('assets/images/' . $page->fb_image);
		$page->twitter_image = asset('assets/images/' . $page->twitter_image);
		$search = $request->search;
		$sorting = $request->sorting;
		$listing_status = $request->listing_status;
		$property_type = $request->type;
		$is_featured = $request->is_featured;
		$features = $request->features;
		$bedrooms = $request->bedrooms;
		$bathrooms = $request->bathrooms;
		$type = $request->type;
		$city = $request->city;
		$properties = Property::query();
		$sortingOptions = [
			1 => ['created_at', 'desc'],
			2 => ['is_featured', 'desc'],
			3 => ['views', 'desc'],
			4 => ['price', 'asc'],
			5 => ['price', 'desc'],
			6 => ['created_at', 'asc'],
			7 => ['created_at', 'desc'],
		];
		if ($search) {
			$properties->where(function ($query) use ($search) {
				$query->where('title', 'like', '%' . $search . '%')
				->orWhere('description', 'like', '%' . $search . '%')
				->orWhere('short_description', 'like', '%' . $search . '%');
			});
		}
		if (isset($sortingOptions[$sorting])) {
			$properties = $properties->orderBy(...$sortingOptions[$sorting]);
		} else {
			$properties = $properties->orderBy('created_at', 'desc');
		}
		if ($bedrooms) {
			$properties->where('bedrooms', $bedrooms);
		}
		if ($bathrooms) {
			$properties->where('bathrooms', $bathrooms);
		}
		if ($listing_status) {
			$properties->where('listing_status', $listing_status);
		}
		if ($city) {
			$properties->where('city', $city);
		}
		if ($is_featured) {
			$properties->where('is_featured', $is_featured);
		}
		if ($property_type) {
			$typeid = Types::select('id')->where('slug', $property_type)->first();
			if ($typeid && $typeid->id) {
				$properties->whereHas('propertyTypes', function ($query) use ($typeid) {
					$query->where('type_id', $typeid->id);
				});
			}
		}
		if ($features) {
			$featureSlugsArray = explode(',', $features);
			$featureIds = Feature::whereIn('slug', $featureSlugsArray)->pluck('id');
			if ($featureIds->isNotEmpty()) {
				$properties->whereHas('propertyFeatures', function ($query) use ($featureIds) {
					$query->whereIn('feature_id', $featureIds);
				});
			}
		}
		$properties = $properties->paginate(8);
		$pages = ceil($properties->total() / 6);
		$filters = $request->all();
		return view('properties/properties', compact('page', 'properties', 'pages', 'filters'));
	}

	public function get_properties($slug)
	{
		$property = Property::where('slug', $slug)->first();
		if ($property) {
			$property->increment('views');
			$gallery = json_decode($property->gallery);
			foreach ($gallery as $key => $image) {
				$gallery[$key] = asset('uploads/properties/' . $image);
			}
			$property->gallery = $gallery;
			$files = json_decode($property->files);
			if($files){
				foreach ($files as $key => $file) {
					$files[$key] = asset('uploads/properties/' . $file);
				}
				$property->files = $files;
			}
			$related_listings = Property::where('listing_status', '1')
			->where('neighborhood_id', $property->neighborhood_id)
			->where('id', '!=', $property->id)
			->limit(4)
			->get();
			$featureIds = PropertyFeature::where('property_id', $property['id'])->pluck('feature_id');
			$features = Feature::whereIn('id', $featureIds)->get();
			$agent = Agents::where('id', $property['agent'])->first();
			$featured = Property::where('is_featured', 2)->orderBy('created_at', 'desc')->limit(4)->get();
			return view('properties.property_details', compact('property', 'features', 'agent', 'related_listings', 'featured'));
		} else {
			return view('common.view_404');
		}
	}

	public function HandlerProperties($slug, Request $request)
	{
		$types = City::where('slug', $slug)->first();
		if ($types) {
			return $this->get_properties_cities($slug);
		}
		$blog = Property::where('slug', $slug)->first();
		if ($blog) {
			return $this->get_properties($slug);
		}
		return view('common.view_404');
	}

	public function get_properties_types($slug, Request $request)
	{
		$page = SEO::where('page_name', 'property')->first();
		$page->fb_image = asset('assets/images/' . $page->fb_image);
		$page->twitter_image = asset('assets/images/' . $page->twitter_image);
		$type = Types::where('slug', $slug)->first();
		$properties = Property::query()->orderBy('created_at', 'desc');
		if ($type) {
			$properties->whereHas('propertyTypes', function ($query) use ($type) {
				$query->where('type_id', $type->id);
			});
		}
		$properties = $properties->paginate(8);
		$total = $properties->total();
		$pages = ceil($total / 8);
		return view('properties/properties', compact('page', 'properties', 'pages'));
	}

	public function get_properties_cities($slug)
	{
		$page = SEO::where('page_name', 'property')->first();
		$page->fb_image = asset('assets/images/' . $page->fb_image);
		$page->twitter_image = asset('assets/images/' . $page->twitter_image);
		$city = City::where('slug', $slug)->first();
		if (!$city) {
			return view('common.view_404');
		}
		$properties = Property::where('city_id', $city->id)
		->orderBy('created_at', 'desc')
		->paginate(8);
		$total = $properties->total();
		$pages = ceil($total / 8);
		return view('properties/properties', compact('page', 'properties', 'pages'));
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
		return $property;
	}
}