<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $allUser = Profile::with('users')->get();

        if (request()->id) {
            $user = Profile::with(['users', 'tanggungans'])->whereHas('users', function ($query) {
                $query->where('nip', request()->id);
            })->first();

            $users = [
                'user' => $user,
                'all' => $allUser
            ];
        } else {
            $user = Profile::with(['users', 'tanggungans'])->whereHas('users', function ($query) {
                $query->where('id', Auth::id());
            })->first();

            $users = [
                'user' => $user,
                'all' => $allUser
            ];
        }

        return view('user.lihat', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nipBaru' => 'required',
            'namaBaru' => 'required',
            'jabatanBaru' => 'required',
            'tglLahirBaru' => 'required',
            'tglBergabungBaru' => 'required',
            'gajiPokokBaru' => 'required',
            'levelAkunBaru' => 'required',
            'emailBaru' => 'required',
            'passwordBaru' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'nip' => $request->nipBaru,
                'email' => $request->emailBaru,
                'level_akun' => $request->levelAkunBaru,
                'password' => bcrypt($request->passwordBaru)
            ]);

            $user->profiles()->create([
                'name' => $request->namaBaru,
                'jabatan' => $request->jabatanBaru,
                'tanggal_lahir' => Carbon::parse($request->tglLahirBaru),
                'mulai_kerja' => Carbon::parse($request->tglBergabungBaru),
                'gaji_pokok' => $request->gajiPokokBaru,
            ]);
        });
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function update($id, Request $request)
    {
        // dd($request);
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_bergabung' => 'required',
            'gaji_pokok' => 'required',
            'level_akun' => 'required',
            'email' => 'required|email',
            'current-password' => 'string',
            'new-password' => 'string|min:8|confirmed',
        ]);


        DB::transaction(function () use ($request, $id) {
            $user = User::find($id);
            $profile = Profile::where('user_id', $id)->first();
            if (!(Hash::check($request->get('current-password'), $user->password))) {
                // The passwords matches
                return redirect()->back()->with("error", "Your current password does not matches with the password.");
            }

            if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
                // Current password and new password same
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }


            $user->update([
                'email' => $request->email,
                'level_akun' => $request->level_akun,
                'password' =>  bcrypt($request->get('new-password'))
            ]);


            $profile->update([
                'name' => $request->nama,
                'jabatan' => $request->jabatan,
                'tanggal_lahir' => Carbon::parse($request->tanggal_lahir),
                'mulai_kerja' => Carbon::parse($request->tanggal_bergabung),
                'gaji_pokok' => $request->gaji_pokok,
            ]);

            return redirect()->back()->with('success', 'Data berhasil diubah.');
        });

        return redirect()->back();
    }

    public function profile()
    {
        $profile = Profile::with(['users', 'tanggungans'])->whereHas('users', function ($query) {
            $query->where('id', Auth::id());
        })->first();

        return view('user.profil', [
            'profile' => $profile
        ]);
    }

    public function update_profile_sendiri(Request $request)
    {
    }
}
