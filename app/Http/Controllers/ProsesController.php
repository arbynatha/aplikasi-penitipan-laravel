<?php

namespace App\Http\Controllers;

use App\Models\aktivitass;
use App\Models\Riwayats;
use App\Models\titips;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function delete_proses(Request $request)
    {
        try {
            // menghapus semua aktivitas
            aktivitass::truncate();

            return redirect()->route('admin')->with('success', 'All Aktivitas records have been deleted.');
        } catch (\Exception $e) {
            return redirect()->route('admin')->with('error', 'Failed to delete Aktivitas records: ' . $e->getMessage());
        }
    }

    public function titip_proses(Request $request)
    {
        // Check the current number of records
        $cek_isi = titips::count();
        $cek_sisa = 200 - $cek_isi;

        if ($cek_isi >= 200) {
            return redirect()->back()->with('alert', 'Loker Sudah Penuh');
        } else {
            // Generate a random code
            $kode = 'ET' . rand(100, 999);
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date('H:i');
            $htm = date('H:00', strtotime($waktu));
            $status = 1;
            $jam_keluar = '';

            // Validasi data
            $request->validate([
                'nama_pemilik' => 'required',
            ]);

            // mengirim data
            $data['kode'] = $kode;
            $data['nama_pemilik'] = $request->nama_pemilik;
            $data['jam_masuk'] = $waktu;
            $data['hitung_jam_masuk'] = $htm;
            $data['status'] = $status;
            $data['jam_keluar'] = null;

            // Check if the owner name already exists
            $cek_nama = titips::where('nama_pemilik', $request->nama_pemilik)->first();

            if ($cek_nama) {
                // jika nama_pemilik sudah ada di database
                if (empty($cek_nama->kode)) {

                    $cek_nama->update($data);
                    return redirect()->route('print', [
                        'nama_pemilik' => $request->nama_pemilik,
                        'cek_isi' => $cek_isi,
                    ])->with('success', 'Data berhasil diupdate.');
                } else {
                    return redirect()->back()->with('alert', 'Anda sudah melakukan penitipan');
                }
            } else {
                // jika nama_pemilik belum ada di database
                titips::create($data);
                return redirect()->route('print', [
                    'nama_pemilik' => $request->nama_pemilik,
                    'cek_isi' => $cek_isi,
                ])->with('success', 'Data berhasil ditambahkan.');
            }
        }
    }

    public function keluar_proses(Request $request, $kode)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H:i');

        // Ambil kode dari request
        $kode = $request->input('kode');

        // Ambil data titip berdasarkan kode
        $titip = titips::where('kode', $kode)->latest()->first();

        Riwayats::create([
            'titips_id' => $titip->id,
            'kode' => $titip->kode,
            'nama_pemilik' => $titip->nama_pemilik,
            'jam_masuk' => $titip->jam_masuk,
            'hitung_jam_masuk' => $titip->hitung_jam_masuk,
            'jam_keluar' => $waktu,
        ]);

        // Update status dan jam_keluar
        $titip->kode        = '';
        $titip->status      = 2; // Ubah status menjadi 2
        $titip->jam_keluar  = $waktu;
        $titip->save();

        // Redirect dengan pesan sukses
        return redirect()->route('index')->with('status', 'Data berhasil diperbaharui!');
    }
}
