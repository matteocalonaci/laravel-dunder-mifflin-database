<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'Order_Date',
        'ID_User',
        'ID_Customer',
        'ID_Product',
        'Quantity',
    ];

    public function employee()
{
    return $this->belongsTo(Employee::class, 'ID_User');
}

public function customer()
{
    return $this->belongsTo(Customer::class, 'ID_Customer');
}

public function product()
{
    return $this->belongsTo(Product::class, 'ID_Product');
}
}
