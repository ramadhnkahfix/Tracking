<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        return view('admin.user', compact('user','jabatan'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'jabatan_id' => 'required',
            'email' => 'required|email|unique:user',
            'password' =>  'required|min:8'
        ]);
        
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'id_jabatan' => $request->id_jabatan,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect ('/admin/user')->with('status','Data berhasil ditambahkan');
    }

    public function status(Request $request){

        $data = User::findOrFail($request->id);
        if($data->status == 1){
            $data->status = 0;
        }
        else{
            $data->status = 1;
        }

        $data->save();

        return response()->json(["success" => true, "data" => $data]);
    }
}
