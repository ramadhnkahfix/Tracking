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

    public function status(Request $request,$id)
    {
        Dokuman::findOrFail($id)->update([
            'status' => $request->status 
        ]);

        return back();
    }

    public function detail($id)
    {
        $dokumen = Dokuman::findOrFail($id);
        $detail_dokumen = DetailDokuman::with('dokuman')->where('dokumen_id_dokumen', $id)->get();
        return view('admin.detail_dokumen')->with([
            'dokumen' => $dokumen,
            'detail_dokumen' => $detail_dokumen
        ]);
    }

    public function profile()
    {
        return view ('admin.profile');
    }


}
