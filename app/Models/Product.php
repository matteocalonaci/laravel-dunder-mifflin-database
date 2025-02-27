<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Product_Name',
        'Quantity',
        'ID_Supplier',
        'price'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'ID_Supplier');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'ID_Product');
    }
}
