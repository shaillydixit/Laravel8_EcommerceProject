<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserPayment()
    {
        return view('frontend.profile.user_payment');
    }

    public function UserOrders()
    {
        return view('frontend.profile.user_orders');
    }

    public function UserAddress()
    {
        return view('frontend.profile.user_address');
    }
}
