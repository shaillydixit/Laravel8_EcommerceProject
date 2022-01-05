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
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $product = Product::where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $special_offers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.index', compact('featured', 'hot_deals', 'special_offers', 'special_deals', 'categories', 'product'));
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
        $colors = $product->product_color;
        $product_color = explode(',', $colors);
        $sizes = $product->product_size;
        $product_size = explode(',', $sizes);
        $subsubcat_id = $product->subsubcategory_id;
        $similar_product = Product::where('subsubcategory_id', $subsubcat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        $multiImg = MultiImage::where('product_id', $id)->get();
        $breadproduct = Product::with(['category', 'subcategory'])->where('id', $id)->get();
        return view('frontend.product.product_details', compact(
            'product',
            'multiImg',
            'product_color',
            'product_size',
            'similar_product',
            'breadproduct'
        ));
    }


    public function ProductTagWise($tag)
    {
        $products = Product::where('status', 1)->where('product_tags', $tag)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        return view('frontend.product.tags_view', compact('products', 'categories', 'brands'));
    }

    public function ProductCategories()
    {
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        return view('frontend.product.product_categories', compact('categories', 'brands'));
    }

    public function ProductCategoryWise($cat_id, $slug)
    {
        $products = Product::where('status', 1)->where('category_id', $cat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        $breadcat = Category::where('id', $cat_id)->get();
        return view('frontend.product.category_view', compact('products', 'categories', 'brands', 'breadcat'));
    }

    public function ProductSubcategoryWise($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        $breadsubcat = SubCategory::with(['category'])->where('id', $subcat_id)->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories', 'brands', 'breadsubcat'));
    }

    public function ProductSubsubcategoryWise($subsubcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_image', 'DESC')->get();
        $breadsubsubcat = SubSubCategory::with(['category', 'subcategory'])->where('id', $subsubcat_id)->get();
        return view('frontend.product.subsubcategory_view', compact('products', 'categories', 'brands', 'breadsubsubcat'));
    }

    public function ProductBrandwise($brand_id)
    {
        $products = Product::where('status', 1)->where('brand_id', $brand_id)->orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('category_name', 'DESC')->get();
        $brands = Brand::orderBy('brand_name', 'DESC')->get();
        return view('frontend.product.brand_view', compact('products', 'categories', 'brands'));
    }

    public function ProductViewAjax($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function ProductSearch(Request $request)
    {
        $request->validate(["search" => "required"]);
        $item = $request->search;
        // echo "$item";
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('product_name', 'LIKE', "%$item%")->get();
        return view('frontend.product.search', compact('products', 'categories'));
    }

    public function SearchProduct(Request $request)
    {
        $request->validate(["search" => "required"]);
        $item = $request->search;
        $products = Product::where('product_name', 'LIKE', "%$item%")->select('product_name', 'product_thumbnail', 'selling_price', 'id')->limit(5)->get();
        return view('frontend.product.search_product', compact('products'));
    }

    public function FeaturedView()
    {
        $product = Product::with(['category', 'subcategory', 'brand'])->where('featured', 1)->orderBy('id', 'DESC')->paginate(8);
        // dd($product);
        return view('frontend.product.featured_view', compact('product'));
    }

    public function SpecialDeals()
    {
        $product = Product::with(['category', 'subcategory', 'brand'])->where('special_deals', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.product.specialdeals_view', compact('product'));
    }

    public function HotDeals()
    {
        $product = Product::with(['category', 'subcategory', 'brand'])->where('hot_deals', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.product.hotdeals_view', compact('product'));
    }

    public function SpecialOffer()
    {
        $product = Product::with(['category', 'subcategory', 'brand'])->where('special_offer', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.product.special_offer', compact('product'));
    }
}
