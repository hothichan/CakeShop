<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $products = product::orderBy('name', 'ASC')->paginate(12);
        return view('shop.index', compact('products'));
    }
    public function getProduct(Category $cat) {
        $products = $cat->products()->paginate(10);
        // $category = category::where('id', $request->id)->first();
        return view('shop.index', compact('products')); 
    }
    public function productDetails(Request $request) {
        $product = product::where('id', $request->id)->first();
        $reviews = $product->reviews()->paginate(5);
        $relatedProduct = product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->get();
        // dd($relatedProduct);
        return view('shop.pruductDetails', compact('product', 'relatedProduct', 'reviews'));
    }

    public function price_filter() {
        // Get the selected price range from the request
        $min = request('min_price');
        $max = request('max_price');
        $category_id = request('category_id');
        if($category_id) {
            $products = product::where('category_id', $category_id)->whereBetween('price', [$min, $max])->paginate(12);
        } else {
            // Apply the price range to the query and fetch the products
            $products = product::whereBetween('price', [$min, $max])->paginate(12);
        }

        // Return the filtered products view with the products and price range
        $view = view('partials.priceFilter', compact('products','min','max'))->render();
        return response()->json(['html' => $view], 200);
    }

    public function search_item() {
        $searchQuery = request('itemName');
        $products = product::where('name', 'LIKE', '%'. $searchQuery. '%')->paginate(12);
        $view = view('partials.priceFilter', compact('products'))->render();
        return response()->json(['html' => $view], 200);
    }

    public function item_sort() {
        $sortByValue = request('sort_by_value');

        switch ($sortByValue) {
            case "price-ascending":
                $products = product::orderBy('price', 'ASC')->paginate(12);
                break;
            case "price-descending":
                $products = product::orderBy('price', 'DESC')->paginate(12);
                break;
            default:
                $products = product::orderBy('name', 'ASC')->paginate(12);
                break;
        }

        $view = view('partials.priceFilter', compact('products'))->render();
        return response()->json(['html' => $view], 200);
    }
}
