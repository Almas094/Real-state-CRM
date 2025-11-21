<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SupercrmDashboardController extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard.admin-dashboard');
    }

}
