<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        return view('dashboard-mod.index');
    }

    public function certificate() {
        return view('pdf.certificate');
    }
}
