<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function AllUsers()
    {
        $users = User::latest()->get();
        return view('backend.users.all_users', compact('users'));
    }
}
