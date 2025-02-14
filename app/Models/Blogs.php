<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'tier',
        // 'parent_id',
        'title',
        'category_id',
        'short_description',
        'description',
        'author_id',
        // 'slug',
        'post_url',
        'featured_image',
        'status',
        'disable_crawl',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'fb_image',
        'fb_title',
        'fb_description',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'json_ld_code',
        'publish_date',
        'created_at',
        'updated_at',
    ];

    public function parent()
    {
        return $this->belongsTo(Blogs::class, 'parent_id');
    }

    // // Get the child article (subarticle)
    public function children()
    {
        return $this->hasMany(Blogs::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
