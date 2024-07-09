<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() 
    {
        return view('login.login');
    }
    
    public function login(Request $request) 
    {
        Session::flash('name', $request->name);
        
        $request->validate([
            'name' => 'required', // menggunakan 'name' untuk form login
            'password' => 'required' // password harus diisi
        ], [
            'name.required' => 'Nama harus diisi.',
            'password.required' => 'Password harus diisi.'
        ]);

        $infologin = [
            'name' => $request->name,
            'password' =>$request->password,
        ];

        if(Auth::attempt($infologin)) {
            return redirect()->to('/')->with('failed', 'Berhasil login');
        } else {
            return redirect()->to('/sesi')->with('failed', 'Nama atau password salah');
        }

        // $credentials = $request->only('name', 'password');

        // if(Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard')->with('success', 'Berhasil login');
        // } else {
        //     return redirect()->route('login')->with('failed', 'Nama atau password salah');
        // }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->to('sesi')->with('failed', 'anda Berhasil logout');
    }
}
