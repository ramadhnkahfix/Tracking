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
        return view('layouts.home');
    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request)
    {
        // // dd($request->all());
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);
        
        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->id_jabatan == 1){
                return redirect()->route('admin');
            }
            elseif(Auth::user()->id_jabatan == 2){
                return redirect()->route('upload');    
            }
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

    public function changePassword(){
        return view('change-password');
    }
    
    public function updatePassword(Request $request){
        $id = Auth::user()->email;

        $user = User::where('email', '=', $id)->first();
        $user->password = bcrypt($request->new_password);
        $user->save();

        if(Auth::user()->id_jabatan == 1){
            return redirect()->route('admin');
        }
        elseif(Auth::user()->id_jabatan == 2){
            return redirect()->route('home');
        }
    }

    public function verify_old_password()
    {
        $old_password = $_POST['old_password'];
        $verify_result =  HASH::check($old_password, Auth::user()->password);
        return response()->json($verify_result);
    }

    public function reload()
    {
        // return response()->json(['captcha'=> captcha-img()]);
        return captcha_img();
    }

    public function getDokumen(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'captcha' => 'required|captcha',
        ]);

        $data = Dokuman::select('status')->where('kode', '=', $request->id)->first();

        return response()->json(['success' => true, 'data' => $data]);
    }
}
