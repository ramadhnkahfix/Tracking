<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use Carbon\Carbon;
use App\Models\User;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload.upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required|email|unique:dokumen',
        //     'subject' => 'required',
        //     'file' => 'required',
        //     'file.*' => 'file|mimes:doc,docx,pdf'
        // ]);

        // dd($request->all());
        
        

        $date = Carbon::now()->format("d-m-Y");

        $dokumen = Dokuman::create([
            'nama_instansi' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'tanggal' =>$date,
            'status' => 1
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
        $user = User::all();
        \Mail::raw('Kode Unik Untuk Tracking Dokumen' . $dokumen->tanggal, function($message) use($dokumen){
            $message->to($dokumen->email, $dokumen->nama);
            $message->subject('Kode Unik Tracking');
        });
        return redirect('/upload')->with('status','Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
