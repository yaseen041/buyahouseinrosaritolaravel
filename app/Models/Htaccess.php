<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htaccess extends Model
{
    use HasFactory;

    protected $table = 'htaccesses';

    protected $fillable = [
        'content',
        'status'
    ];
}
