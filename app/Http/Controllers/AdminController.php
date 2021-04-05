<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.dashboard');
    }

    public function dokumen()
    {
        return view('admin.dokumen');
    }

    public function detail()
    {
        return view('admin.detail_dokumen');
    }

    public function profile()
    {
        return view ('admin.profile');
    }
}
