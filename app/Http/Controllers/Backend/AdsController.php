<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function AllAds()
    {
        $ads = Advertisement::latest()->get();
        return view('backend.ads.all_advertisement', compact('ads'));
    }

    public function AddAds(Request $request)
    {

        $image = $request->file('ads_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1556, 1428)->save('upload/ads/' . $name_gen);
        $save_url = 'upload/ads/' . $name_gen;

        Advertisement::insert([
            'ads_image' => $save_url,
            'ads_title' => $request->ads_title,
            'ads_description' => $request->ads_description,
            'ads_discount' => $request->ads_discount,
            'status' => 1,
        ]);

        $notification = [
            'message' => 'Advertisement added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function EditAds($id)
    {
        $ads = Advertisement::findOrFail($id);
        return view('backend.ads.edit_advertisement', compact('ads'));
    }

    public function UpdateAds(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('ads_image')) {
            unlink($old_img);
            $image = $request->file('ads_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1556, 1428)->save('upload/ads/' . $name_gen);
            $save_url = 'upload/ads/' . $name_gen;

            Advertisement::findOrFail($id)->update([
                'ads_image' => $save_url,
                'ads_title' => $request->ads_title,
                'ads_description' => $request->ads_description,
                'ads_discount' => $request->ads_discount,
                'status' => 1,
            ]);

            $notification = [
                'message' => 'Advertisement updated successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.advertisement')->with($notification);
        } else {
            Advertisement::findOrFail($id)->update([
                'ads_title' => $request->ads_title,
                'ads_description' => $request->ads_description,
                'ads_discount' => $request->ads_discount,
                'status' => 1,
            ]);

            $notification = [
                'message' => 'Advertisement updated successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.advertisement')->with($notification);
        }
    }

    public function DeleteAds($id)
    {
        $ads = Advertisement::findOrFail($id);
        $img = $ads->ads_image;
        unlink($img);
        Advertisement::findOrFail($id)->delete();
        $notification = [
            'message' => 'Advertisement deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function InactiveAds($id)
    {
        Advertisement::findOrFail($id)->update(['status' => 0]);
        $notification = [
            'message' => 'Advertisement Inactive!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function ActiveAds($id)
    {
        Advertisement::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Advertisement Active!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
