<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'slug',
        'about',
        'description',
        'country_id',
        'province_id',
        'city_id',
    ];
}
