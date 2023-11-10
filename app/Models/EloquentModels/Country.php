<?php

namespace App\Models\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'abbr',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
