<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function AlumniDashboard (Request $request)
    {
        return view('alumni.alumni_dashboard');
    }
}
