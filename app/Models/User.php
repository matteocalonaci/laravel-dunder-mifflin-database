<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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

    // Define the one-to-one relationship with Employee
    public function employee()
    {
        return $this->hasOne(Employee::class, 'ID_User'); // Specify the foreign key
    }
}
