<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'cart_id', 'quantity'];

    public function product() {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
}
