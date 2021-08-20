<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->paginate(5);
        return view('backend.category.category_view', compact('categories'));
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
            'category_image' => 'required'
        ]);
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/category/' . $name_gen);
        $save_url = 'upload/category/' . $name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url,
            'category_icon' => $request->category_icon

        ]);
        $notification = [
            'message' => 'Category Added Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('categories'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('category_image')) {
            // unlink($old_img);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;
            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
                'category_icon' => $request->category_icon,
            ]);
            $notification = [
                'message' => 'Category Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('all.category')->with($notification);
        } else {
            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_icon' => $request->category_icon
            ]);
            $notification = [
                'message' => 'Category Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('all.category')->with($notification);
        }
    }
    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $notification = [
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
    }
}
