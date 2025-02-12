<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentBlogCategories extends Model
{
    use HasFactory;

    protected $table = 'parent_blog_categories';

    protected $fillable = [
        'blog_id',
        'parent_id',
    ];
}
