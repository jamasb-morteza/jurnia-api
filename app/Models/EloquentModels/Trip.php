<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'tour_id',
        'src_city_id',
        'title',
        'slug',
        'about',
        'description',
        'start_date',
        'end_date',
    ];
}
