<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "type",
        "first_name",
        "last_name",
        "birthdate",
        "age",
        "address",
        "email",
        "contact",
        "password"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Generate a random password
            $randomPassword = Str::random(8);

            // Hash the password
            $hashedPassword = bcrypt($randomPassword);

            // Set the password attribute on the user model
            $user->password = $hashedPassword;
        });
    }
}
