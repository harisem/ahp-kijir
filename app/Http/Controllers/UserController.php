<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'foto_profil_baru' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'nip' => $request->nipBaru,
                'email' => $request->emailBaru,
                'level_akun' => $request->levelAkunBaru,
                'password' => bcrypt($request->passwordBaru)
            ]);

            if ($request->file('foto_profil')) {
                $file = $request->file('foto_profil');
                $fileName = Str::random(20) . '.' . $file->extension();
                $file->move('profiles', $fileName);
            }

            $user->profiles()->create([
                'name' => $request->namaBaru,
                'jabatan' => $request->jabatanBaru,
                'tanggal_lahir' => Carbon::parse($request->tglLahirBaru),
                'mulai_kerja' => Carbon::parse($request->tglBergabungBaru),
                'gaji_pokok' => $request->gajiPokokBaru,
                'foto_profil' => $request->file('foto_profil') ? $fileName : 'default.jpg',
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
            'foto_profil' => 'image|mimes:jpeg,png,jpg|max:2048',
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

            if ($request->file('foto_profil')) {
                $file = $request->file('foto_profil');
                $fileName = Str::random(20) . '.' . $file->extension();
                $file->move('profiles', $fileName);

                $profile->update([
                    'foto_profil' => $fileName
                ]);
            }

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

    public function changeProfilePicture(Request $request)
    {
        $profile = Profile::whereHas('users', function ($query) {
            $query->where('id', Auth::id());
        })->first();

        // dd($profile);

        $request->validate([
            'profilePic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('profilePic');
        $fileName = Str::random(20) . '.' . $file->extension();
        $file->move('profiles', $fileName);

        $profile->update([
            'foto_profil' => $fileName
        ]);

        return redirect()->back()->with('success', 'Foto profil berhasil diubah.');
    }

    public function update_profile_sendiri(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'current-password' => 'string',
            'new-password' => 'string|min:8|confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }
        $user->email = $request->email;
        $user->password = bcrypt($request->get('new-password'));
        $user->update();

        return redirect()->back()->with('success', 'berhasil update profile');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        DB::transaction(function () use ($user) {
            $profile = Profile::where('user_id', $user->id)->first();
            $profile->delete();
            $user->delete();
        });
        return redirect()->route('user.lihat')->with('success', 'user berhasil di hapus.');
    }
}
