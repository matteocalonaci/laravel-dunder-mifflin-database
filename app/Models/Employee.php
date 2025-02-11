<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_User', // Foreign key to users table
        'First_Name',
        'Last_Name',
        'ID_Department',
        'ID_Office',
        'Phone',
        'Email',
    ];

    // Define the inverse of the relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User'); // Specify the foreign key
    }
}
