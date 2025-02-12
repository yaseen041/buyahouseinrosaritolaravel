<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'code',
        'title',
        'slug',
        'price',
        'views',
        'neighborhood_id',
        'listing_status',
        'size',
        'size_mt',
        'bedrooms',
        'bathrooms',
        'parking_spaces',
        'banner',
        'gallery',
        'map',
        'description',
        'short_description',
        'address',
        'country',
        'state',
        'city',
        'dev_lvl',
        'year_built',
        'property_tax',
        'hoa_fees',
        'rent_cycle',
        'date_available',
        'status',
        'listing_type',
        'lattitude',
        'longitude',
        'GLA',
        'GLA_mt',
        'avg_ft',
        'avg_mt',
        'files',
        'agent',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'fb_image',
        'fb_title',
        'fb_description',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'json_ld_code'
    ];

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function propertyTypes()
    {
        return $this->hasMany(PropertyType::class, 'property_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agents::class, 'agent');
    }
}
