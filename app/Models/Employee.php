<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'First_Name',
        'Last_Name',
        'ID_User',
        'ID_Department',
        'ID_Office',
        'Phone',
        'Email',
    ];

    public function department()
{
    return $this->belongsTo(Department::class, 'ID_Department');
}

public function user()
{
    return $this->belongsTo(User::class, 'ID_User');
}
}
