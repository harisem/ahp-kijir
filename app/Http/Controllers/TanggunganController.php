<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TanggunganController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('users:id,nip')->get();
        return view('user.tanggungan', [
            'profiles' => $profiles
        ]);
    }

    public function create(Request $request)
    {
        $profiles = Profile::with('users:id,nip')->get();

        $request->validate([
            'nip' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tglLahir' => 'required',
            'status' => 'required'
        ]);

        $selectedUser = $profiles->find($request->nip);
        $selectedUser->tanggungans()->create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tanggal_lahir' => Carbon::parse($request->tglLahir),
            'status_keluarga' => $request->status
        ]);

        return redirect()->route('user.tanggungan')->with('success', 'Data berhasil disimpan.');
    }
}
