<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {

        $ship = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    } // end method 


    public function StateGetAjax($district_id)
    {

        $ship = ShippingState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function CheckoutStore(Request $request)
    {
        // dd($request)->all();
        // $data = array();
        // $data['first_name'] = $request->first_name;
        // $data['last_name'] = $request->last_name;
        // $data['shipping_email'] = $request->shipping_email;
        // $data['shipping_phone'] = $request->shipping_phone;
        // $data['shipping_zipcode'] = $request->shipping_zipcode;
        // $data['shipping_address'] = $request->shipping_address;
        // $data['shipping_landmark'] = $request->shipping_landmark;
        // $data['division_id'] = $request->division_id;
        // $data['district_id'] = $request->district_id;
        // $data['state_id'] = $request->state_id;

        $data = ShippingAddress::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'shipping_zipcode' => $request->shipping_zipcode,
            'shipping_address' => $request->shipping_address,
            'shipping_landmark' => $request->shipping_landmark,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'created_at' => Carbon::now(),
        ]);
        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return 'cash';
        }
    }
}
