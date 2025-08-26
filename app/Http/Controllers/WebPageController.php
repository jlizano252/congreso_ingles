<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function details() {
        return view('congress-details');
    }
}
