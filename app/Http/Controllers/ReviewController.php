<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function comment() {
        $comment = request('comment');
        $rating = request('rating');
        $product_id = request('product_id');
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $product_id,
            'rating' => $rating,
            'comment' => $comment,
        ];
        
        if(review::create($data)) {
            $product = product::where('id', $product_id)->first();
            $view = view('partials.comment', compact('product'))->render();
            return response()->json(['html' => $view], 200);
        } else {
            return response()->json(['error' => 'Lỗi khi đánh giá'], 500);
        }
    }
}
