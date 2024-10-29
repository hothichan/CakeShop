<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function items() {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }
}