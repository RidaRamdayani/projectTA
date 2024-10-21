<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    
        public function loginadmin()
        {
        return view('login.loginadmin');
        }

        public function login()
        {
            return view('login.login');
        }

        public function loginproses(Request $request){
        // return $request;
            $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            // return 'logiin berhasil';
            return redirect('/form'); // Pengalihan jika login berhasil
        } else {
            return redirect()->back()->withErrors('Login failed. Please check your credentials.'); // Pengalihan jika login gagal
        }

        }
        public function registrasi()
        {
            return view('login.registrasi');
        }

        public function registrasiuser(Request $request)
        {
            User::create([
                'nama' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ]);
            // dd($request->all());
            return redirect('/login');
        }
    }
    

