<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Str;

class HomeController extends Controller
{
    
    public function index()
    {
        if(!Auth::user()){
            return view('layouts.home');
        }
        elseif(Auth::user()->id_jabatan == 1){
            return redirect()->route('admin');
        }
        elseif(Auth::user()->id_jabatan == 2){
            return redirect()->route('upload');    
        }

    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($request->only('email','password'))){
            // if(auth()->user()->jabatan()->nama == 'Super Admin'){
            //     return redirect('/admin');
            // }
            return redirect('/');
        }      
        session()->flash('error', 'Invalid Email or Password');
        return redirect('/login');
    
    }

    public function signup(){
        return view('register');
    }

    public function postsignup(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:user|email',
            'password' => 'required|min:8',
            'confirmation' => 'required|same:password'
        ]);

        // dd($request->all());
        User::create([
            'id_jabatan' => 2,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login')->with('status', 'Anda berhasil registrasi, Kami telah mengirim email untuk konfirmasi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect ('/login');

    }
    

}
