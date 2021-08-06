<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function AllSubCategory()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::latest()->paginate(5);
        return view('backend.subcategory.subcategory_view', compact('categories', 'subcategories'));
    }

    public function StoreSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required'
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = [
            'message' => 'SubCategory Added Successfully!',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
    public function EditSubCategory($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('categories', 'subcategories'));
    }

    public function UpdateSubcategory(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required'
        ]);

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = [
            'message' => 'SubCategory Updated Successfully!',
            'alert-type' => 'warning'
        ];
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'SubCategory Deleted Successfully!',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }
}
