@extends('index')
@section('title', 'Daftar Laporan')
@section('konten')
@section('strip', 'Daftar Laporan')

<div class="row" style="margin-top: 10px;">
    <!-- Daftar Helm -->
    <div class="row-md-6 col-sm-12">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h4 style="color: white; font-size: 20pt;">Daftar Helm <span class="right"
                        style="color: #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi: cek
                        isi</span></h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr style="font-size: 13pt">
                                <th style="max-width: 120px;">Kode</th>
                                <th style="max-width: 250px;">Nama Pemilik</th>
                                <th style="max-width: 200px;">Jam Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($titips as $titip)
                                @if ($titip->status == '1')
                                    <tr style="font-size: 11pt">
                                        <td>{{ $titip->kode }}</td>
                                        <td>{{ $titip->nama_pemilik }}</td>
                                        <td>{{ $titip->jam_masuk }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end:Daftar Helm -->

    <!-- History Kendaraan -->
    <div class="row-md-6 col-sm-12" style="margin-top: 10px;">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h4 style="color: white; font-size: 20pt;">Riwayat</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr style="font-size: 13pt">
                                <th style="max-width: 250px;">Nama Pemilik</th>
                                <th style="max-width: 200px;">Jam Masuk</th>
                                <th style="max-width: 200px;">Jam Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $riwayats)
                                    <tr style="font-size: 11pt">
                                        <td>{{ $riwayats->titips->nama_pemilik }}</td>
                                        <td>{{ $riwayats->jam_masuk }}</td>
                                        <td>{{ $riwayats->jam_keluar }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end:History Kendaraan -->
</div>
@endsection
