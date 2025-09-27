<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function dashboardperangkat()
    {
        return view("backend.perangkatdesa.dashboard");
    }
}
