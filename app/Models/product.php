<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];

    public $appends = ['favorited'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function reviews() {
        return $this->hasMany(review::class, 'product_id', 'id');
    }

    public function getFavoritedAttribute()
    {
        $favorited = Favorited::where(['user_id' => auth()->id(), 'product_id' => $this->id])->first();
        return $favorited ? true : false;
    }
}
