<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage()
    {
        $products = Product::query();
        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $catIds)->paginate(9);
        } else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(9);
        }
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'DESC')->get();
        return view('frontend.shop.shop_page', compact('products', 'categories', 'brands'));

        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id', $brandIds)->paginate(9);
        } else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(9);
        }
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'DESC')->get();
        return view('frontend.shop.shop_page', compact('products', 'categories', 'brands'));
    }

    public function ShopFilter(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        // Filter Category

        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }
        // Filter Brand 

        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand=' . $brand;
                } else {
                    $brandUrl .= ',' . $brand;
                }
            }
        }
        return redirect()->route('shop.page', $catUrl . $brandUrl);
    }
}
