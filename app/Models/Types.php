<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'status',
    ];

    public function propertyTypes()
    {
        return $this->hasMany(PropertyType::class, 'type_id');
    }
}
