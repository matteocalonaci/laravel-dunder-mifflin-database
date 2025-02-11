<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'Office_Name',
        'Address',
        'Phone',
    ];

    public function departments()
{
    return $this->hasMany(Department::class, 'ID_Office');
}
}
