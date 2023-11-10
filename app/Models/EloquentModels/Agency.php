<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'name',
        'slug',
        'about',
        'description',
        'created_at',
        'updated_at'
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'agency_id', 'id');
    }
}
