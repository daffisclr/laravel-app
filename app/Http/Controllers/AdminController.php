<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $data['getRecord'] = User::find(Auth::user()->id);
        return view ('admin.admin_profile', $data);
    }

    // Update Admin Profile
    public function AdminProfileUpdate (Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'username' => 'required|unique:users,username,'.Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name     = trim($request->name);
        $user->email    = trim($request->email);
        $user->username = trim($request->username);
        $user->phone    = trim($request->phone);
        // $user->password = trim($request->password);
        $user->save();

        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        return redirect('admin/profile')->with('success', 'Profil admin telah berhasil diubah....');
    }
}
