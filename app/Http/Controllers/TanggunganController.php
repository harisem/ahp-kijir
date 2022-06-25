<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Pengajuan;
use App\Models\Profile;
use App\Models\Tanggungan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $created = $selectedUser->tanggungans()->create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tanggal_lahir' => Carbon::parse($request->tglLahir),
            'status_keluarga' => $request->status
        ]);


        if ($created) {
            $user = User::find($selectedUser->user_id);
            $user->notifications()->create([
                'content' => $request->nama . ' telah ditambahkan sebagai tanggunganmu.'
            ]);

            $data = array('name' => $user->profiles->name, 'message' => 'Tanggungan telah ditambah ', $created->name);
            Mail::send('laporan.email_status', ['data' => $data, 'email' => $user], function ($message) use ($user) {

                $message->from(env('MAIL_USERNAME'), 'Beasiswa');
                $message->to($user->email)->subject('Status Notfikasi Update');
            });
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil disimpan.');
        }
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
