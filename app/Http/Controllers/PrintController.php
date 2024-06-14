<?php

namespace App\Http\Controllers;

use App\Models\role_users;
use App\Models\titips;
use App\Models\User;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print(Request $request)
    {
        $nama_pemilik = $request->input('nama_pemilik');
        $titip = Titips::where('nama_pemilik', $nama_pemilik)->first();
    
        return view('print.index', compact('nama_pemilik', 'titip'));
    }

    public function print_proses(Request $request)
    {
        $role  = role_users::all();
        $user = User::all();
        $titip = titips::all();
        return view('dashboard.index', compact('role', 'user', 'titip'));
    }
}
