<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = auth()->guard('admin')->user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile', compact('adminData'));
    }

    public function AdminProfileEdit($id)
    {
        $editdata = Admin::findOrFail($id);
        return view('admin.admin_profile_edit', compact('editdata'));
    }

    public function AdminProfileUpdate(Request $request, $id)
    {
        $old_img = $request->old_image;
        if ($request->file('profile_photo_path')) {
            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(80, 80)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'profile_photo_path' => $save_url,
            ]);
            $notification = [
                'message' => 'Admin Profile Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('admin.profile')->with($notification);
        } else {
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            $notification = [
                'message' => 'Admin Profile Updated Successfully!',
                'alert-type' => 'warning'
            ];

            return redirect()->route('admin.profile')->with($notification);
        }
    }


    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdateChangePassword(Request $request){
        $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$admin = Admin::find(Auth::id());
			$admin->password = Hash::make($request->password);
			$admin->save();
			Auth::logout();
			return redirect()->route('admin.logout');
		}else{
			return redirect()->back();
		}


    }

    public function AllUsers()
    {
        $users = User::latest()->paginate(3);
        return view('backend.users.all_users', compact('users'));
    }

}
