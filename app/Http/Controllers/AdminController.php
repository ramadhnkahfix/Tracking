<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use App\Models\DokumenSelesai;
use Carbon\Carbon;

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
        $dokumen = Dokuman::findOrFail($id)->first();
        $detail_dokumen = DetailDokuman::with('dokuman')->where('dokumen_id_dokumen', $id)->get();
        $dokumen_selesai = DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->get();
        $data = $dokumen_selesai->first();

        return view('admin.detail_dokumen')->with([
            'dokumen' => $dokumen,
            'detail_dokumen' => $detail_dokumen,
            'dokumen_selesai' => $dokumen_selesai,
            'data' => $data
        ]);
    }

    public function storeDokumen(Request $request)
    {
        $date = Carbon::now()->format("Y-m-d");
        
        $data = [];
        $i = 0;
        foreach($request->file as $key){
            $file = $request->file('file');
            $name = $file[$i]->getClientOriginalName();
            $file[$i]->move('file_balasan/', $name);

            $data[] = [
                'file' => $name,
                'tanggal' => $date,
                'author' => $request->user,
                'dokumen_id_dokumen' =>$request->id
            ];
            $i++;
        }
        DokumenSelesai::insert($data);

        return redirect()->back()->with('status','Data Berhasil di Tambahkan');
    }

    public function profile()
    {
        return view ('admin.profile');
    }

    public function download($id)
    {
        $data = DetailDokuman::findOrFail($id);
        $file = public_path()."/document"."/".$data->file; 

        return response()->download($file, $data->file);
    }
}
