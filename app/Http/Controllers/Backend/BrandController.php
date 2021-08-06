<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $categories = Category::orderBy('category_name', 'ASC')->paginate(15);
        $brands = Brand::latest()->paginate(6);
        return view('backend.brand.brand_view', compact('brands', 'categories'));
    }

    public function StoreBrand(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(80, 80)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'category_id' => $request->category_id,
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Brand Added Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
    public function EditBrand($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $brands = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('categories', 'brands'));
    }

    public function UpdateBrand(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('brand_image')) {
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(80, 80)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            Brand::insert([
                'category_id' => $request->category_id,
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);
            $notification = [
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);
            $notification = [
                'message' => 'Brand Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('all.brand')->with($notification);
        }
    }
    public function DeleteBrand($id)
    {
        $brands = Brand::findOrFail($id);
        $img = $brands->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = [
            'message' => 'Brand Deleted Successfully!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
    }
}
