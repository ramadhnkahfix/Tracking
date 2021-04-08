<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.dashboard');
    }

    public function dokumen()
    {
        $dokumen = Dokuman::all();
        return view('admin.dokumen', compact('dokumen'));
    }

    public function detail()
    {
        $detail_dokumen = DetailDokuman::with('dokuman')->get();
        return view('admin.detail_dokumen')->with([
            'detail_dokumen' => $detail_dokumen
        ]);
    }

    public function profile()
    {
        return view ('admin.profile');
    }
}
