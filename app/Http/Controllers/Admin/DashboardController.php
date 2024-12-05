<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }
    public function dashboardUser()
    {
        return view('pages.user.dashboard');
    }
}
