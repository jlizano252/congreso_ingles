<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostulationController extends Controller
{
     public function index() {
        return view('public-mod.public-postulation');
    }

    public function emailViewTest() {
        return view('mail.register-email-notification');
    }

    public function emailViewError() {
        return view('public-mod.error');
    }
}
