<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 
        'product_id',
        'quantity',
        'price',
    ];

    public function product() {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
    public function order() {
        return $this->belongsTo(order::class);
    }
}
