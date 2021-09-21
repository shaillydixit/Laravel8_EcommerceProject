<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSettings()
    {
        $setting = SiteSetting::find(1);
        return view('backend.settings.setting_update', compact('setting'));
    }

    public function StoreSettings(Request $request)
    {
        $setting_id = $request->id;

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/sitesettings/' . $name_gen);
            $save_url = 'upload/sitesettings/' . $name_gen;

            SiteSetting::findOrFail($setting_id)->update([
                'logo' => $save_url,
            ]);

            $notification = [
                'message' => 'Website Settings Instered Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'working_days' => $request->working_days,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'created_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Website Settings Instered Successfully',
                'alert-type' => 'success',
            ];
        }
    }


    // seo

    public function SeoSettings()
    {
        $seo = SeoSetting::find(1);
        return view('backend.settings.seo_update', compact('seo'));
    }

    public function SeoUpdate(Request $request)
    {
        $seo_id = $request->id;

        SeoSetting::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,

        ]);

        $notification = array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
