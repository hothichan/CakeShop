<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description','image'];
    protected $hidden = ['created_at', 'updated_at'];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id')->orderBy('created_at', 'DESC');
    }
}
