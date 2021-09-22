<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function AllAdminUsers()
    {
        $adminuser = Admin::where('type', 2)->latest()->paginate(4);
        return view('backend.roles.admin_users', compact('adminuser'));
    }

    public function AddAdminRole()
    {
        return view('backend.roles.admin_roles');
    }

    public function StoreAdminUser(Request $request)
    {
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupan' => $request->coupan,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return_order' => $request->return_order,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'all_user' => $request->all_user,
            'admin_user_role' => $request->admin_user_role,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.admin.users')->with($notification);
    }

    public function EditAdminUser($id)
    {
        $adminuser = Admin::findOrFail($id);
        return view('backend.roles.admin_roles_edit', compact('adminuser'));
    }

    public function UpdateAdminUser(Request $request, $id)
    {
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {
            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupan' => $request->coupan,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->return_order,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'all_user' => $request->all_user,
                'admin_user_role' => $request->admin_user_role,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = [
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.admin.users')->with($notification);
        } else {
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupan' => $request->coupan,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return_order' => $request->return_order,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'all_user' => $request->all_user,
                'admin_user_role' => $request->admin_user_role,
                'type' => 2,
                'created_at' => Carbon::now(),
            ]);
            $notification = [
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.admin.users')->with($notification);
        }
    }

    public function DeleteAdminUser($id)
    {
        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();
        $notification = [
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    }
}
