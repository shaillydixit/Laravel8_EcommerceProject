<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.product.add_product', compact('categories'));
    }

    public function GetBrand($category_id)
    {
        $brand = Brand::where('category_id', $category_id)->orderBy('brand_name', 'ASC')->get();
        return json_encode($brand);
    }

    public function StoreProduct(Request $request)
    {
        // $request->validate([
        //     'digital_file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);
        if ($files = $request->file('digital_file')) {
            $destinationPath = 'upload/pdf';
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $digitalItem);
        }
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/thumbnail/' . $name_gen);
        $save_url = 'upload/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'product_thumbnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            // 'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        //for multiple images
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/multi-image/' . $make_name);
            $uploadPath = 'upload/multi-image/' . $make_name;

            MultiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Product Inserted Successfully!',
            'alert_type' => 'info',
        ];
        return redirect()->route('manage.product')->with($notification);
    }

    public function ManageProduct()
    {
        $products = Product::latest()->paginate(6);
        return view('backend.product.manage_product', compact('products'));
    }

    public function EditProduct($id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $multiImgs = MultiImage::where('product_id', $id)->get();
        $products = Product::findOrFail($id);

        return view('backend.product.edit_product', compact(
            'categories',
            'brands',
            'subcategories',
            'subsubcategories',
            'multiImgs',
            'products'
        ));
    }


    public function UpdateProduct(Request $request, $id)
    {
        if ($request->file('product_thumbnail')) {
            $oldImage = Product::findOrFail($id);
            unlink($oldImage->product_thumbnail);
            $image = $request->file('product_thumbnail');
            $thumb_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/thumbnail/' . $thumb_name);
            $save_thumb = 'upload/thumbnail/' . $thumb_name;

            Product::findOrFail($id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'product_tags' => $request->product_tags,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'product_thumbnail' => $save_thumb,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'status' => 1,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Product Data Updated Successfully!',
                'alert-type' => 'info',
            );
            return redirect()->route('manage.product')->with($notification);
        } else {
            Product::findOrFail($id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_id' => $request->subsubcategory_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'product_tags' => $request->product_tags,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Product Data Updated Successfully!',
                'alert-type' => 'info',
            );
            return redirect()->route('manage.product')->with($notification);
        }
    }
    public function UpdateProductImage(Request $request)
    {
        $images = $request->multi_img;
        foreach ($images as $id => $img) {
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/multi-image/' . $make_name);
            $uploadPath = 'upload/multi-image/' . $make_name;

            MultiImage::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProductImage($id)
    {
        $oldimg = MultiImage::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImage::findOrFail($id)->delete();
        $notification = [
            'message' => 'Product Multi Images Deleted Successfully!',
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($notification);
    }

    public function InactiveProduct($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = [
            'message' => 'Product Inactive!',
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($notification);
    }

    public function ActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Product Active!',
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $productt = Product::findOrFail($id);
        unlink($productt->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImage::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImage::where('product_id', $id)->delete();
        }
        $notification = [
            'message' => 'Product Deleted Successfully!',
            'alert-type' => 'warning',
        ];
        return redirect()->back()->with($notification);
    }

    public function ProductStock()
    {
        $products = Product::latest()->paginate(5);
        return view('backend.product.product_stock', compact('products'));
    }
}
