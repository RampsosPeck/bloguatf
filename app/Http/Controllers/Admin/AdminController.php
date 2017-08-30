<?php

namespace Bloguatf\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Bloguatf\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
