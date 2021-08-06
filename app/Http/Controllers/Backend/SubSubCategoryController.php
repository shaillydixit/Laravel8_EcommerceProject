<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function AllSubSubCategory()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->paginate(6);
        return view('backend.subsubcategory.subsubcategory_view', compact('categories', 'subsubcategories'));
    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }

    public function StoreSubSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),
        ]);

        $notification = [
            'message' => 'SubSubCategory Added Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function EditSubSubCategory($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory.subsubcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));
    }

    public function UpdateSubSubCategory(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ]);

        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),
        ]);

        $notification = [
            'message' => 'SubSubCategory Updated Successfully!',
            'alert-type' => 'warning',
        ];

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function DeleteSubSubCategory($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'SubSubCategory Deleted Successfully!',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}
