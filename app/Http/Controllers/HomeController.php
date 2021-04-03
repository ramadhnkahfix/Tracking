<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('layouts.home');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        User::create([
            'id_jabatan' => '2',
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login')->with('status', 'Anda berhasil registrasi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect ('/login');

    }
    

}
