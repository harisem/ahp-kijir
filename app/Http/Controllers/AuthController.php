<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // dd($request);
        request()->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('nip', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    }

    public function register(Request $request)
    {
        $user = User::create([
            'nip' => $request->nip,
            'email' => $request->email,
            'level_akun' => $request->level_akun,
            'password' => Hash::make($request->password),
        ]);

        $user->profiles()->create([
            'nama' => $request->nama,
            'jabatan' => Str::ucfirst($request->level_akun),
            'tanggal_lahir' => $request->tanggal_lahir,
            'mulai_kerja' => $request->mulai_kerja,
            'gaji_pokok' => $request->gaji_pokok,
            'foto_profil' => $request->foto_profil,
        ]);

        return redirect()->back()->with('success', 'Data berhasil di buat');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
