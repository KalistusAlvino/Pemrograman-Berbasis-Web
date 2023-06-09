<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function formlogin(){
        return view('login');
    }
    public function simpan(Request $request){
        User::create([
            'nik_user' => $request->nik_user,
            'nama_user' => $request->nama_user,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password)
        ]);

        
        return redirect('/');
    }
    public function ceklogin(Request $request)
    {
        if (Auth::attempt([
            'nik_user' => $request->nik_user,
            'password' => $request->password
        ]))
        {
            $user = Auth::user()->nama_user ?? '';
            return redirect('/home')->with('login', 'Selamat datang'.",".$user."!");
        }
        else
        {
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
