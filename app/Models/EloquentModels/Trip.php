<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'agency_id',
        'tour_id',
        'src_city_id',
        'title',
        'slug',
        'about',
        'description',
        'status',
        'start_date',
        'end_date',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function srcCity()
    {
        return $this->belongsTo(City::class, 'src_city_id', 'id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'trip_stops', 'trip_id', 'location_id', 'id', 'id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
