<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function ManageSlider()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_manage', compact('sliders'));
    }

    public function StoreSlider(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',
        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 300)->save('upload/slider/' . $name_gen);
        $save_img = 'upload/slider/' . $name_gen;
        Slider::insert([
            'slider_image' => $save_img,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Slider Inserted Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function InactiveSlider($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = [
            'message' => 'Slider Inactive!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function ActiveSlider($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Slider Active!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function EditSlider($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        if ($request->file('slider_image')) {
            $old_img = Slider::findOrFail($id);
            unlink($old_img->slider_image);
            $image = $request->file('slider_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 300)->save('upload/slider/' . $img_name);
            $save_image = 'upload/slider/' . $img_name;

            Slider::findOrFail($id)->update([
                'slider_image' => $save_image,
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'warning',
            ];

            return redirect()->route('manage.slider')->with($notification);
        } else {
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'warning',
            ];

            return redirect()->route('manage.slider')->with($notification);
        }
    }

    public function DeleteSlider($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_image);
        Slider::findOrFail($id)->delete();

        $notification = [
            'message' => 'Slider Deleted Successfully!',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }
}
