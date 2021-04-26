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
        $user = User::where('id_jabatan', '=', '1')->get();
        return view('admin.user', compact('user'));
    }

    public function store(Request $request){
        // $request->validate([
        //     'name' => 'required',
        //     'jabatan_id' => 'required',
        //     'email' => 'required|email|unique:user',
        //     'password' =>  'required|min:8'
        // ]);
        
        // dd($request->all());
        User::create([
            'nama' => $request->name,
            'id_jabatan' => 1,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'role' => $request->role,
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
