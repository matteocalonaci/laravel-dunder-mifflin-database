<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public $timestamps = true;

    public function isAdmin(): bool
    {
        return strtolower($this->role) === 'admin';
    }

    public function isEmployee(): bool
    {
        return strtolower($this->role) === 'employee';
    }

    // Relazione con il modello Employee
    public function employee()
    {
        return $this->hasOne(Employee::class, 'ID_User');
    }
    public function customers()
{
    return $this->hasMany(Customer::class);
}
}
