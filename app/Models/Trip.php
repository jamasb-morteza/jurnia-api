<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'src_location_id',
        'title',
        'description',
        'start_date',
        'end_date',
    ];
}
