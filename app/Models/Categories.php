<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    // Get the child categories (subcategories)
    public function children_bk()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
    // New Code
    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id')->with('children');
    }
    public function posts()
    {
        return $this->hasMany(Blogs::class, 'category_id');
    }
}