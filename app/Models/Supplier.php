<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'Supplier_Name', // Corrected spelling
        'Contact_Info',
        'Products_Offered',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'ID_Supplier');
    }
}
