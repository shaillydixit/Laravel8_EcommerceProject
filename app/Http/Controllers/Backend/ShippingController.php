<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;

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
            'created_at' => Carbon::now(),
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
            'updated_at' => Carbon::now(),
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
    //district

    public function ManageDistrict()
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.shipping.district.district_view', compact('districts', 'divisions'));
    }

    public function StoreDistrict(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'District Name Added Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function EditDistrict($id)
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('backend.shipping.district.district_edit', compact('districts', 'divisions'));
    }

    public function UpdateDistrict(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShippingDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'District Name Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage.district')->with($notification);
    }

    public function DeleteDistrict($id)
    {
        ShippingDistrict::findOrFail($id)->delete();
        $notification = [
            'message' => 'District Name Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }


    //state

    public function ManageState()
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShippingState::with('division', 'district')->orderBy('id', 'DESC')->get();
        return view('backend.shipping.state.state_view', compact('districts', 'divisions', 'states'));
    }
    public function GetDistrict($division_id)
    {
        $district = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    }
    public function StoreState(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShippingState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'State Name Added Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function EditState($id)
    {
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name', 'ASC')->get();
        $states = ShippingState::findOrFail($id);
        return view('backend.shipping.state.state_edit', compact('districts', 'divisions', 'states'));
    }

    public function UpdateState(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShippingState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'State Name Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage.state')->with($notification);
    }

    public function DeleteState($id)
    {
        ShippingState::findOrFail($id)->delete();
        $notification = [
            'message' => 'State Name Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
