<?php

namespace App\Http\Controllers;

use App\Models\aktivitass;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H:i');
        $tanggal = date('D, d M Y');
        return view('Auth.index', compact('waktu', 'tanggal'));
    }

    // Membuat syntax pembuatan petugas
    public function register_proses(request $request)
    {
        $request->validate([
            'username'               => 'required|unique:users,username',
            'role_users_id'          => 'required',
            'password'               => 'required|',
        ]);

        // mengirim data
        $data['username']       = $request->username;
        $data['role_users_id']   = $request->role_users_id;
        $data['password']       = Hash::make($request->password);

        // melakukan insert
        User::create($data);
        return redirect()->route('admin')->with('succses', 'Berhasil Menambah Petugas');
    }

    public function login_proses(Request $request)
    {

        // sesuaikan waktu
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i');

        // validasi data yg dimasukkan
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // melakukan autentikasi
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        //    melakukan pengecekan data sekaligus menambahkan data ke log aktififtas
        if (Auth::attempt($credentials)) {

            $userId = Auth::id();
            // menyiapkan data yg dikirim ke log aktivitas
            $data = [

                'users_id' => $userId,
                'username' => $request->username,
                'jam_login' => $waktu,

            ];

            // mengirim data ke log aktifitas
            aktivitass::create($data);

            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau password yang Anda masukkan salah');
        }
    }

    public function logout()
    {
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i');

        $userId = Auth::id();

        // mencari aktivitas sebelumnya
        $aktivitas = aktivitass::where('users_id', $userId)->latest()->first();

        if ($aktivitas) {

            //    update log aktifitas
            $aktivitas->update(['jam_logout' => $waktu]);
        }

        Auth::logout();

        // Redirect to the login page
        return redirect()->route('login')->with('succsess', 'Kamu Berhasil Logout');
    }
}
