<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
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
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ]);

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
