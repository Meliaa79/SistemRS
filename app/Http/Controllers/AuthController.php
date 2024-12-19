<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function tampilRegistrasi()
    {
        return view('registrasi');
    }

    function submitRegistrasi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'pasien'; 
        $user->save();
        return redirect()->route('login.tampil')->with('success', 'Registrasi Berhasil dilakukan');
    }

    function tampilLogin()
    {
        return view('login');
    }

    function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return $this->redirect();
        }

        return back()->with('error', 'Periksa kembali email dan kata sandi anda.');
    }

    function redirect()
    {
        $role = auth()->user()->role;
        $url  = 'home';
        switch ($role) {
            case 'admin':
                $url = 'admin.dashboard';
                break;
            case 'dokter':
                $url = 'dokter.dashboard';
                break;
            case 'apoteker':
                $url = 'apoteker.dashboard';
                break;
            default:
                $url = 'home';
                break;
        }

        return redirect()->route($url)->with('success', 'Berhasil dialihkan');
    }
}
