<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use App\Models\DokumenSelesai;
use Carbon\Carbon;
use Storage;
use App\Mail\NotifikasiDokBalasan;
use App\Mail\NotifikasiPengembalianDok;
use App\Mail\NotifikasiDokPenolakan;
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

    public function dokumen()
    {
        if(Auth::user()->role == 1 || Auth::user()->role == null){
            $dokumen = Dokuman::
                        join('dokumen_selesai as ds', 'ds.dokumen_id_dokumen', '=', 'dokumen.id_dokumen')
                        ->where(['approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 2){
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

    public function selesai()
    {
        $dokumen = Dokuman::where('status', '=', 3)->get();

        return view('admin.riwayat.selesai', compact('dokumen'));
    }

    public function ditolak()
    {
        $dokumen = Dokuman::where('approve', '=', 3)->get();

        return view('admin.riwayat.ditolak', compact('dokumen'));
    }

    // Untuk menu selain super admin dan sekretaris
    public function riwayatApproved()
    {
        if(Auth::user()->role == 2){
            $dokumen = Dokuman::where(['user_role' => 2, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 3){
            $dokumen = Dokuman::where(['user_role' => 3, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 4){
            $dokumen = Dokuman::where(['user_role' => 4, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 5){
            $dokumen = Dokuman::where(['user_role' => 5, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 6){
            $dokumen = Dokuman::where(['user_role' => 6, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 7){
            $dokumen = Dokuman::where(['user_role' => 7, 'approve' => 1])->where('status', '!=', 3)->get();
        }
        else if(Auth::user()->role == 8){
            $dokumen = Dokuman::where(['user_role' => 8, 'approve' => 1])->where('status', '!=', 3)->get();
        }

        return view('admin.riwayat.approved', compact('dokumen'));
    }

    // Untuk menu selain super admin dan sekretaris
    public function riwayatRejected()
    {
        if(Auth::user()->role == 2){
            $dokumen = Dokuman::where(['user_role' => 2, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 3){
            $dokumen = Dokuman::where(['user_role' => 3, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 4){
            $dokumen = Dokuman::where(['user_role' => 4, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 5){
            $dokumen = Dokuman::where(['user_role' => 5, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 6){
            $dokumen = Dokuman::where(['user_role' => 6, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 7){
            $dokumen = Dokuman::where(['user_role' => 7, 'approve' => 2])->get();
        }
        else if(Auth::user()->role == 8){
            $dokumen = Dokuman::where(['user_role' => 8, 'approve' => 2])->get();
        }

        return view('admin.riwayat.rejected', compact('dokumen'));
    }

    public function deleteApprovedById($id)
    {
        $data = DetailDokuman::where('dokumen_id_dokumen', '=', $id)->get();
        $balasan = DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->get();

        //Hapus file
        foreach($data as $d){
            Storage::disk('public')->delete("/document"."/".$d->file);
        }
        foreach($balasan as $b){
            Storage::disk('public')->delete("/file_balasan"."/".$b->file);
        }

        //Hapus Database
        DetailDokuman::where('dokumen_id_dokumen', '=', $id)->delete();
        DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->delete();
        Dokuman::where('id_dokumen', '=', $id)->delete();

        return back();
    }

    public function deleteApprovedAll()
    {
        $data = Dokuman::where(['status' => 3, 'approve' => 1])->get();

        //Hapus file
        foreach($data as $d){
            $detail = DetailDokuman::where('dokumen_id_dokumen', '=', $d->id_dokumen)->get();
            $balasan = DokumenSelesai::where('dokumen_id_dokumen', '=', $d->id_dokumen)->get();

            foreach($detail as $det){
                Storage::disk('public')->delete("/document"."/".$det->file);
            }
            foreach($balasan as $b){
                Storage::disk('public')->delete("/file_balasan"."/".$b->file);
            }

            DokumenSelesai::where('dokumen_id_dokumen', '=', $d->id_dokumen)->delete();
            DetailDokuman::where('dokumen_id_dokumen', '=', $id)->delete();
        }

        //Hapus Database
        Dokuman::where(['status' => 3, 'approve' => 1])->delete();

        return back();
    }

    public function deleteRejectedById($id)
    {
        $data = DetailDokuman::where('dokumen_id_dokumen', '=', $id)->get();
        
        //Hapus file
        foreach($data as $d){
            Storage::disk('public')->delete("/document"."/".$d->file);
        }
        
        //Hapus Database
        DetailDokuman::where('dokumen_id_dokumen', '=', $id)->delete();
        Dokuman::where('id_dokumen', '=', $id)->delete();

        return back();
    }

    public function deleteRejectedAll()
    {
        $id_dokumen = Dokuman::select('id_dokumen')->where('approve', '=', 2)->get();

        foreach($id_dokumen as $id){
            $file = DetailDokuman::where('dokumen_id_dokumen', '=', $id->id_dokumen)->get();

            //Hapus file
            foreach($file as $f){
                Storage::disk('public')->delete("/document"."/".$f->file);
            }
        
            //Hapus Database
            DetailDokuman::where('dokumen_id_dokumen', '=', $id->id_dokumen)->delete();
        }
        //Hapus Database
        Dokuman::select('id_dokumen')->where('approve', '=', 2)->delete();

        return back();
    }

    public function deleteDitolakById($id)
    {
        $data = DetailDokuman::where('dokumen_id_dokumen', '=', $id)->get();
        
        //Hapus file
        foreach($data as $d){
            Storage::disk('public')->delete("/document"."/".$d->file);
        }
        
        //Hapus Database
        DetailDokuman::where('dokumen_id_dokumen', '=', $id)->delete();
        Dokuman::where('id_dokumen', '=', $id)->delete();

        return back();
    }

    public function deleteDitolakAll()
    {
        $data = Dokuman::where(['approve' => 3])->get();
        
        //Hapus file
        foreach($data as $d){
            $detail = DetailDokuman::where('dokumen_id_dokumen', '=', $d->id_dokumen)->get();

            foreach($detail as $det){
                Storage::disk('public')->delete("/document"."/".$det->file);
            }
            DetailDokuman::where('dokumen_id_dokumen', '=', $d->id_dokumen)->delete();
        }
        
        //Hapus Database
        Dokuman::where(['approve' => 3])->delete();

        return back();
    }

    public function deleteSelesaiById($id)
    {
        $data = DetailDokuman::where(['dokumen_id_dokumen' => $id])->get();
        $selesai = DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->get();
        
        //Hapus file
        foreach($data as $d){
            Storage::disk('public')->delete("/document"."/".$d->file);
        }
        foreach($selesai as $s){
            Storage::disk('public')->delete("/document"."/".$s->file);
        }
        
        //Hapus Database
        DetailDokuman::where(['dokumen_id_dokumen' => $id])->delete();
        DokumenSelesai::where('dokumen_id_dokumen', '=', $id)->delete();
        Dokuman::where('id_dokumen', '=', $id)->delete();

        return back();
    }

    public function deleteSelesaiAll()
    {
        $data = Dokuman::where(['status' => 3, 'approve' => 1])->get();
        
        //Hapus file
        foreach($data as $d){
            $detail = DetailDokuman::where('dokumen_id_dokumen', '=', $d->id_dokumen)->get();
            $selesai = DokumenSelesai::where('dokumen_id_dokumen', '=', $d->id_dokumen)->get();
            
            foreach($detail as $det){
                Storage::disk('public')->delete("/document"."/".$det->file);
            }
            foreach($selesai as $s){
                Storage::disk('public')->delete("/document"."/".$s->file);
            }

            DetailDokuman::where('dokumen_id_dokumen', '=', $d->id_dokumen)->delete();
            DokumenSelesai::where('dokumen_id_dokumen', '=', $d->id_dokumen)->delete();
        }
        
        //Hapus Database
        Dokuman::where(['status' => 3, 'approve' => 1])->delete();

        return back();
    }

    public function reject(Request $request,$id)
    {
        $data = Dokuman::findOrFail($id);

        if($data->approve == 1){
            $data->approve = 3;
            $data->alasan = $request->alasan;
        }
        else if($data->approve == 0){
            $data->approve = 2;
            $data->alasan = $request->alasan;

        }  
        $data->save();
        $dokumen = Dokuman::where('id_dokumen', '=', $id)->first();
        $doc = DetailDokuman::where('id_detail_dokumen', '=', $id)->get();
        if($data->approve == 2){
            \Mail::to($dokumen->email)->send(new NotifikasiPengembalianDok($dokumen, $doc));
        }
        else if($data->approve == 3){
            \Mail::to($dokumen->email)->send(new NotifikasiDokPenolakan($dokumen, $doc));
        }

        return back();
    }

    public function approve($id)
    {
        Dokuman::findOrFail($id)->update([
            'approve' => 1,
            'status' => 2,
        ]);

        return redirect('admin.riwayat.approve');
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
        $email->status = 3;
        $email->save();
        $dokumen = DokumenSelesai::where('dokumen_id_dokumen','=',$id)->get();
        // dd($dokumen);
        \Mail::to($email->email)->send(new NotifikasiDokBalasan($dokumen));
        
        // dd('Email Berhasil dikirim');
        return back()->with('status','File berhasil di Kirim ke Email');
    }
}
