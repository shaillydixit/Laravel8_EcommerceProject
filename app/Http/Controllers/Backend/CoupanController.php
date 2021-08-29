<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoupanController extends Controller
{
    public function ManageCoupan()
    {
        $coupans = Coupan::orderBy('id', 'DESC')->get();
        return view('backend.coupan.view_coupan', compact('coupans'));
    }

    public function StoreCoupan(Request $request)
    {
        $request->validate([
            'coupan_name' => 'required',
            'coupan_discount' => 'required',
            'coupan_validity' => 'required',
        ]);

        Coupan::insert([
            'coupan_name' => strtoupper($request->coupan_name),
            'coupan_discount' => $request->coupan_discount,
            'coupan_validity' => $request->coupan_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Coupan Instered Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function EditCoupan($id)
    {
        $coupans = Coupan::findOrFail($id);
        return view('backend.coupan.edit_coupan', compact('coupans'));
    }

    public function UpdateCoupan(Request $request, $id)
    {
        $request->validate([
            'coupan_name' => 'required',
            'coupan_discount' => 'required',
            'coupan_validity' => 'required',
        ]);

        Coupan::findOrFail($id)->update([
            'coupan_name' => strtoupper($request->coupan_name),
            'coupan_discount' => $request->coupan_discount,
            'coupan_validity' => $request->coupan_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Coupan Updated Successfully',
            'alert-type' => 'info',
        ];
        return redirect()->route('manage.coupans')->with($notification);
    }

    public function DeleteCoupan($id)
    {
        Coupan::findOrFail($id)->delete();
        $notification = [
            'message' => 'Coupan Deleted Successfully',
            'alert-type' => 'warning',
        ];
        return redirect()->back()->with($notification);
    }
}
