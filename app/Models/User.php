<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Change this line
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Change this line
{
    use HasFactory, Notifiable; // Add Notifiable trait

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true; // This is true by default, but you can specify it explicitly
}
