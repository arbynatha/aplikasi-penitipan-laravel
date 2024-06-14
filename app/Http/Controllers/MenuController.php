<?php

namespace App\Http\Controllers;

use App\Models\aktivitass;
use App\Models\Riwayats;
use App\Models\role_users;
use App\Models\titips;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $role  = role_users::all();
        $user = User::all();
        $titip = titips::all();
        return view('dashboard.index', compact('role', 'user', 'titip'));
    }

    // ROUTE YANG MENGHUBUNGKAN HALAMAN ALBUM PADA FOLDER ALBUM 
    public function daftar()
    {
        $role  = role_users::all();
        $user = User::all();
        $titips = titips::all();
        $riwayat    = Riwayats::all();

        return view('dashboard.daftar', compact('role', 'user', 'titips', 'riwayat'));
    }

    public function admin()
    {
        $role       = role_users::all();
        $user       = User::all();
        $aktivitas  = aktivitass::all();
        $riwayat    = Riwayats::all();

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H:i');
        $tanggal = date('D, d M Y');
        return view('dashboard.admin', compact('waktu', 'tanggal', 'role', 'user', 'aktivitas', 'riwayat'));
    }
}
