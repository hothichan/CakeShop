<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute ;
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

    protected function averageRating() : Attribute {
        $percentage = 0;
        $reviews = $this->reviews()->get();
        // dd($reviews);
        $reviewsArr = [];
        foreach($reviews as $review) {
            $reviewsArr[] = $review->rating;
        }
        if(!empty($reviewsArr)){
            $ratingCounts = array_count_values($reviewsArr);
            $totalRatings = 0;
            $numRatings = 0;
    
            foreach ($ratingCounts as $stars => $count) {
                $totalRatings += $stars * $count;
                $numRatings += $count;
            }
    
            // Tính trung bình và phần trăm
            $averageRating = $totalRatings / $numRatings;
            $percentage = ($averageRating - 1) / 4 * 100;
        }
        return Attribute::make(
            get: fn() => $percentage
        );
    }
}
