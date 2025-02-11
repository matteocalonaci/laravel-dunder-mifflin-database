<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'Department_Name',
        'ID_Office',
        'Number_of_Employees',
    ];

    public function office()
{
    return $this->belongsTo(Office::class, 'ID_Office');
}

public function employees()
{
    return $this->hasMany(Employee::class, 'ID_Department');
}
}
