<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokuman;
use App\Models\DetailDokuman;
use Carbon\Carbon;

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
        $data = [];
        if ($request->hasFile('file')){
            foreach($request->file('file[]') as $file){
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/document/', $name);
                $data[] = $name;
            }
        }

        

        $date = Carbon::now()->format("d-m-Y");

        Dokuman::create([
            'nama_instansi' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'tanggal' =>$date,
            'status' => 1
        ]);

        $id = Dokuman::orderBy('id_dokumen', 'desc')->first();

        $detail = [];
        for($i=0; $i<count($data); $i++){
            $detail[] = [
                'file' => $data[$i],
                'dokumen_id_dokumen' => $id
            ];
        }
        DetailDokuman::insert($detail);

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
