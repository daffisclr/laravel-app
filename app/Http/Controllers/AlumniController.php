<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    // Alumni Show Homepage (index)
    public function AlumniDashboard (Request $request)
    {
        return view('alumni.index');
    }

    // Alumni Logout
    public function AlumniLogout (Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/alumni/login');
    }

    // Alumni Login
    public function AlumniLogin (Request $request)
    {
        return view('alumni.alumni_login');
    }

    // Alumni Register
    public function AlumniRegister (Request $request)
    {
        return view('alumni.alumni_register');
    }
}
