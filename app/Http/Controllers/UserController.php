<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function profile()
    {
        $profile = Profile::with(['users', 'tanggungans'])->whereHas('users', function ($query) {
            $query->where('id', Auth::id());
        })->first();

        return view('user.profil', [
            'profile' => $profile
        ]);
    }
}
