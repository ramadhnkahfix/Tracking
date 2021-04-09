<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use App\Models\DokumenSelesai;

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
        $date = Carbon::now()->format("d-m-Y");

        DokumenSelesai::create([
            'file' => $request->nama,
            'tanggal' => $date,
            'author' => $request->subject,
            'dokumen_id_dokumen' =>$date
        ]);

        $id = Dokuman::select('id_dokumen')->orderBy('id_dokumen', 'desc')->first();
        
        $detail = [];
        $i = 0;
        foreach($request->file as $key){
            $file = $request->file('file');
            $name = $file[$i]->getClientOriginalName();
            $file[$i]->move('document/', $name);

            $detail[] = [
                'file' => $name,
                'dokumen_id_dokumen' => $id->id_dokumen
            ];
            $i++;
        }
        DetailDokuman::insert($detail);

        return redirect('/upload')->with('status','Data Berhasil di Tambahkan');
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
