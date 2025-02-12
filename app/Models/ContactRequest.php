<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $table = 'contact_requests';


    protected $fillable = [
        'name',
        'email',
        'phone',
        'property_ids',
        'message',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'id', 'property_ids');
    }
}
