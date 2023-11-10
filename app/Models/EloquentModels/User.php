<?php

namespace App\Models\EloquentModels;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'username',
        'mobile_number',
        'email',
        'email_ignore_free_loader',
        'password',
        'birth_date',
        'verified_at',
        'email_verified_at',
        'mobile_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setEmailIgnoreFreeLoaderAttribute()
    {
        $email = str_replace('.', '', $this->email);
        $email = str_replace(' ', '', $email);
        $email = str_replace('+', '', $email);
        $this->attributes['email_ignore_free_loader'] = $email;
    }
}
