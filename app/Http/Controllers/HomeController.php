<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Dokuman;
use Str;
use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Crypt;

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
            if(Auth::user()->id_jabatan == 1 && Auth::user()->status == 1){
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
        ],['nama.required' => 'Field nama tidak boleh kosong',
            'email.required' => 'Field email tidak boleh kosong',
            'email.email' => 'Field harus berupa email',
            'email.unique:user' => 'Email sudah terdaftar',
            'password.required' => 'Field password tidak boleh kosong',
            'password.min:8' => 'Password minimal 8 character',
            'confirmation.required' => 'Field konfirmasi password tidak boleh kosong',
            'confirmation.same:password' => 'Konfrimasi password tidak sesuai']);

        // dd($request->all());
        User::create([
            'id_jabatan' => 2,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1,
            'remember_token' => Str::random(60)
        ]);
        return redirect('/login')->with('status', 'Anda berhasil registrasi, silahkan Log In.');
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

        if(Auth::user()->id_jabatan == 1 && Auth::user()->status == 1){
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

    public function getDok(Request $request)
    {
        $this->validate($request, [ 
            'kode' => 'required',
            'captcha' => 'required|captcha',
        ]);

        $check = Dokuman::all();
        
        for($i = 0; $i<count($check); $i++){
            $decrypt = $this->check($check[$i]->kode);
            
            if($decrypt == $request->kode){
                $id = $check[$i]->id_dokumen;
            }
        }
        $data = Dokuman::select('status', 'approve')->where('id_dokumen', '=', $id)->first();

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function check($x){
        $hasil = Crypt::decryptString($x);
        return $hasil;
    }
}
