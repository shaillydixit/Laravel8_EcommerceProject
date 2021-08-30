<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function ManageDivision()
    {
        $shippings = ShippingDivision::orderBy('id', 'DESC')->get();
        return view('backend.shipping.division.division_view', compact('shippings'));
    }

    public function StoreDivision(Request $request)
    {
        $request->validate([
            'division_name' => 'required'
        ]);
        ShippingDivision::insert([
            'division_name' => $request->division_name,
        ]);
        $notification = [
            'message' => 'Division Name Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function EditDivision($id)
    {
        $shippings = ShippingDivision::findOrFail($id);
        return view('backend.shipping.division.division_edit', compact('shippings'));
    }

    public function UpdateDivision(Request $request, $id)
    {
        $request->validate([
            'division_name' => 'required'
        ]);
        ShippingDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
        ]);
        $notification = [
            'message' => 'Division Name Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.division')->with($notification);
    }

    public function DeleteDivision($id)
    {
        ShippingDivision::findOrFail($id)->delete();
        $notification = [
            'message' => 'Division Name Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
