<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seo extends Model
{
    use HasFactory;

    protected $table = 'seos';
    protected $fillable = [
        'page_name',
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
        'author_id',
        'status',
        'publish_date',
        'created_at',
        'updated_at',
    ];
}
