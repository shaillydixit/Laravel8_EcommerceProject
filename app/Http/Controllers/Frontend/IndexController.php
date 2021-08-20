<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Brand;

class IndexController extends Controller
{
    public function index()
    {
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(7)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(7)->get();
        return view('frontend.index', compact('featured', 'hot_deals', 'special_offers', 'special_deals'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserPayment()
    {
        return view('frontend.profile.user_payment');
    }

    public function UserOrders()
    {
        return view('frontend.profile.user_orders');
    }

    public function UserAddress()
    {
        return view('frontend.profile.user_address');
    }

    public function ProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $multiImg = MultiImage::where('product_id', $id)->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        return view('frontend.product.product_details', compact('product', 'multiImg', 'hot_deals'));
    }

    public function ProductGrid()
    {
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        $product = Product::latest()->get();
        return view('frontend.product.product_grid', compact('categories', 'brands', 'product'));
    }

    public function ProductList()
    {
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        $product = Product::latest()->limit(4)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(4)->get();
        return view('frontend.product.product_list', compact('categories', 'brands', 'product', 'special_deals'));
    }
}
