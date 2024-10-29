<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 
        'name',
        'phone',
        'address',
        'user_id',
    ];
    protected $appends = ['totalPrice'];
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function orderDetails() {
        return $this->hasMany(orderDetail::class, 'order_id', 'id');
    }
    public function getTotalPriceAttribute(){
        $total = 0;
        foreach($this->orderDetails as $item) {
            $total += $item->price;
        }
        return $total;
    }

}
