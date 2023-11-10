<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'slug',
        'start_date',
        'end_date',
        'about',
        'description',
        'agency_id'
    ];


    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }
}
