<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardadmin()
    {
        return view("backend.admin.dashboard");
    }
}
