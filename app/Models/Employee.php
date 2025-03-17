<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_User', // Foreign key to users table
        'image',
        'First_Name',
        'Last_Name',
        'ID_Department',
        'ID_Office',
        'Phone',
        'Email',
        'hired_at'
    ];

    public function orders()
{
    return $this->hasMany(Order::class, 'ID_User'); // 'ID_User' è la chiave esterna in 'orders'
}
public function user()
    {
        return $this->belongsTo(User::class, 'ID_User'); // Assicurati che 'ID_User' sia il campo corretto
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'ID_Department'); // Specifica la chiave esterna
    }

}
