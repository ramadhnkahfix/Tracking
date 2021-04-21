<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use App\Models\DokumenSelesai;
use Carbon\Carbon;
use Storage;
use App\Mail\NotifikasiDokBalasan;
use Auth;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $year = Carbon::now()->format('y');

        if(Auth::user()->role == 1 || Auth::user()->role == null){
            $data[0] = Dokuman::where(['approve' => 1])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 2){
            $data[0] = Dokuman::where(['user_role' => 2])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 2])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 2])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 2])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 3){
            $data[0] = Dokuman::where(['user_role' => 3])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 3])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 3])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 3])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 4){
            $data[0] = Dokuman::where(['user_role' => 4])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 4])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 4])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 4])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 5){
            $data[0] = Dokuman::where(['user_role' => 5])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 5])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 5])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 5])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 6){
            $data[0] = Dokuman::where(['user_role' => 6])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 6])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 6])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 6])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 7){
            $data[0] = Dokuman::where(['user_role' => 7])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 7])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 7])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 7])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }
        else if(Auth::user()->role == 8){
            $data[0] = Dokuman::where(['user_role' => 8])->get();
            $data[1] = Dokuman::where(['status' => 1, 'approve' => 1, 'user_role' => 8])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[2] = Dokuman::where(['status' => 2, 'approve' => 1, 'user_role' => 8])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen'); 
            $data[3] = Dokuman::where(['status' => 3, 'approve' => 1, 'user_role' => 8])->where(DB::raw('YEAR(tanggal)', $year))->count('id_dokumen');
        }

        return view('admin.layouts.dashboard')->with(compact('data'));
    }

    // Untuk menu selain super admin dan sekretaris
    public function dokumen()
    {
        if(Auth::user()->role == 2){
            $dokumen = Dokuman::where(['user_role' => 2, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 3){
            $dokumen = Dokuman::where(['user_role' => 3, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 4){
            $dokumen = Dokuman::where(['user_role' => 4, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 5){
            $dokumen = Dokuman::where(['user_role' => 5, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 6){
            $dokumen = Dokuman::where(['user_role' => 6, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 7){
            $dokumen = Dokuman::where(['user_role' => 7, 'approve' => 0])->get();
        }
        else if(Auth::user()->role == 8){
            $dokumen = Dokuman::where(['user_role' => 8, 'approve' => 0])->get();
        }
        
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
        $dokumen_selesai = DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->get();
        $data = $dokumen_selesai->first();

        return view('admin.detail_dokumen')->with([
            'dokumen' => $dokumen,
            'detail_dokumen' => $detail_dokumen,
            'dokumen_selesai' => $dokumen_selesai,
            'data' => $data
        ]);
    }

    public function editDetailDokumen(Request $request)
    {
        $data = DokumenSelesai::findOrFail($request->id);
        Storage::disk('public')->delete("/file_balasan"."/".$data->file);

        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move('file_balasan/', $name);

        $data->file = $name;
        $data->save();

        return redirect()->back();
    }

    public function deleteDetailDokumen($id)
    {
        $data = DokumenSelesai::findOrFail($id);
        Storage::disk('public')->delete("/file_balasan"."/".$data->file);
        $data->delete();

        return redirect()->back();
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

        return redirect()->back()->with('status','File Berhasil di Upload');
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

    public function emailDok($id)
    {
        // $dokumen = Dokuman::findOrFail($id)->get();
        
        $email = Dokuman::where('id_dokumen', '=', $id)->first();
        $dokumen = DokumenSelesai::where('dokumen_id_dokumen','=',$id)->get();
        // dd($dokumen);
        \Mail::to($email->email)->send(new NotifikasiDokBalasan($dokumen));
        
        // dd('Email Berhasil dikirim');
        return back()->with('status','File berhasil di Kirim ke Email');
    }
}
