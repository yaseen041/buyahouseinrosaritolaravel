<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';


    protected $fillable = [
        'name',
        'slug',
        'state',
        'country',
        'image',
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

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class, 'city_id', 'id');
    }
    public function properties()
    {
        return $this->hasMany(Property::class, 'city', 'name');
    }
}
