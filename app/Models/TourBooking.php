<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $table = 'tour_bookings';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'property_id',
        'type',
        'message',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
