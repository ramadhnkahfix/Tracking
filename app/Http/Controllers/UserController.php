<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jabatan;

class UserController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        $user = User::all();
        return view('admin.user', compact('user','jabatan'));
    }

    public function store(Request $request){
        $requeust->validate([
            'name' => 'required',
            'jabatan_id' => 'required',
            'email' => 'required|unique',
            'password' =>  'required'
        ]);

        User::create([
            'name' => $request->name,
            'id_jabatan' => $request->jabatan_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect ('/admin-user')->with('status','Data berhasil ditambahkan');
    }
}
