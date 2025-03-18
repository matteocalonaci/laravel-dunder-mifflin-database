<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specifica i campi che possono essere assegnati in massa
    protected $fillable = [
        'Customer_Name',
        'Contact_Number',
        'Address',
        'employee_id', // Aggiungi employee_id qui
    ];

    // Relazione uno-a-molti con gli ordini
    public function orders()
    {
        return $this->hasMany(Order::class, 'ID_Customer');
    }

    // Relazione molti-a-uno con l'employee
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id'); // Specifica il campo foreign key
    }
}
