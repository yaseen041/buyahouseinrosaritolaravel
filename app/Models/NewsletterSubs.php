<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubs extends Model
{
    use HasFactory;

    protected $table = 'newsletter_subs';

    protected $fillable = [
        'email'
    ];
}
