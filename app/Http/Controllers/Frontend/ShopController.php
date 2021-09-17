<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage()
    {
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name', 'DESC')->get();
        return view('frontend.shop.shop_page', compact('products', 'categories'));
    }
}
