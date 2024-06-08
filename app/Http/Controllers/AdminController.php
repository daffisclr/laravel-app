<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    // Admin Show Index (HomePage)
    public function AdminDashboard (Request $request)
    {
        return view('admin.index');
    }

    // Admin Logout
    public function AdminLogout (Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // Admin Login
    public function AdminLogin (Request $request)
    {
        return view('admin.admin_login');
    }

    // Admin Profile
    public function AdminProfile (Request $request)
    {
        return view ('admin.admin_profile');
    }
}
