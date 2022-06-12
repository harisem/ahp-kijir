<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Pengajuan;
use App\Models\Profile;
use App\Models\Tanggungan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggunganController extends Controller
{
    public function index()
    {
        $allProfile = Profile::with('users:id,nip')->get();

        if (request()->id) {
            $profile = Profile::with(['users:id,nip', 'tanggungans'])->whereHas('users', function ($query) {
                $query->where('nip', request()->id);
            })->first();

            $profiles = [
                'profile' => $profile,
                'all' => $allProfile
            ];
        } else {
            $profile = Profile::with(['users:id,nip', 'tanggungans'])->whereHas('users', function ($query) {
                $query->where('id', Auth::id());
            })->first();

            $profiles = [
                'profile' => $profile,
                'all' => $allProfile
            ];
        }

        return view('user.tanggungan', [
            'profiles' => $profiles
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tglLahir' => 'required',
            'status' => 'required'
        ]);

        $selectedUser = Profile::with('users')->whereHas('users', function ($query) use ($request) {
            $query->where('nip', $request->nip);
        })->first();
        $selectedUser->tanggungans()->create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tanggal_lahir' => Carbon::parse($request->tglLahir),
            'status_keluarga' => $request->status
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $tanggungan = Tanggungan::find($id);
        $deleted = $tanggungan->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Data terhapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil dihapus.');
        }
    }
}
