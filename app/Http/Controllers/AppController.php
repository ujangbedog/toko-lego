<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('app.home');
    }

    public function admin_home()
    {
        return view('admin.home');
    }

    public function about()
    {
        return view('app.about');
    }
    public function contact()
    {
        return view('app.contact');
    }
    
}
