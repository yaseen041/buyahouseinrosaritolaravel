<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $table = 'neighborhoods';

    protected $fillable = [
        'title',
        'slug',
        'code',
        'banner',
        'zip',
        'city_id',
        'state',
        'country',
        'map',
        'latitude',
        'longitude',
        'images',
        'description',
        'status',
        'amenity_icon1',
        'amenity_icon2',
        'amenity_icon3',
        'amenity_title1',
        'amenity_title2',
        'amenity_title3',
        'amenity_desc1',
        'amenity_desc2',
        'amenity_desc3',
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

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value) : null;
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = $value ? json_encode($value) : null;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
