@extends('index')
@section('title', 'dashboard')
@section('konten')
@section('strip', 'dashboard')


<div class="col-md-7" style="margin-top: 30px;">
    <div class="panel panel-default">
        <div class="panel-heading bg-teal">
            <h4 style="color: white; font-size: 20pt;">Daftar Penitipan <span class="right"
                    style="color: #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty: </span>
            </h4>
        </div>
        <div class="panel-body" style="padding-bottom:25px;">
            <div class="col-md-12">
                <form action="{{ route('titip-proses') }}"
                    method="POST">
                    @csrf
                    <div class="col-md-10">
                        <div class="form-group form-animate-text" style="margin-top:15px !important;">
                            <input type="text" class="form-text" name="nama_pemilik" id="nama_pemilik" required>
                            <span class="bar"></span>
                            <label for="nama_pemilik">Nama Pemilik</label>
                        </div>
                    </div>
                    <button class="btn btn-primary col-md-12" type="submit" style="height: 40px">Submit</button>
                </form>
            </div>
        </div>

        {{-- <script>
            // Script untuk mengganti nilai parameter kode di action form
            document.querySelector('form').setAttribute('action', document.querySelector('form').getAttribute('action').replace(
                '__nama_pemilik__', document.getElementById('nama_Pemilik').value));
        </script> --}}


    </div>
</div>

<!-- Keluar Parkir -->
<div class="col-md-5" style="margin-top: 30px">
    <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading bg-teal">
            <center>
                <h4 style="color: white; font-size: 20pt;">Keluar</h4>
            </center>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:25px;">
            <div class="col-md-12">
                <form action="{{ route('keluar-proses', ['kode' => '__kode__']) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:25px !important;">
                                <input type="text" class="form-control" name="kode" id="kode_keluar" required>
                                <span class="bar"></span>
                                <label for="kode_keluar">Masukkan Kode</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary col-md-12" type="submit" style="height: 40px"
                        id="btnKeluar">Go</button>
                </form>
            </div>
        </div>

        <script>
            // Script untuk mengganti nilai parameter kode di action form
            document.querySelector('form').setAttribute('action', document.querySelector('form').getAttribute('action').replace(
                '__kode__', document.getElementById('kode_keluar').value));
        </script>



    </div>
</div>
<!-- end:Keluar Parkir -->

<!-- Daftar Kendaraan Yang Parkir -->
<div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
    <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading bg-teal">
            <h4 style="color: white;font-size: 20pt;">Daftar Penitipan <span class="right"
                    style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi :
                </span></h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0">
                    <thead>
                        <tr style="font-size: 13pt">
                            <th style="max-width: 120px;">Kode</th>
                            <th style="max-width: 250px;">Nama Pemilik</th>
                            <th style="max-width: 200px;">Jam Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($titip as $titips)
                            @if ($titips->status == '1')
                                <tr style="font-size: 11pt">
                                    <td>{{ $titips->kode }}</td>
                                    <td>{{ $titips->nama_pemilik }}</td>
                                    <td>{{ $titips->jam_masuk }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end:Daftar Kendaraan Yang Parkir -->
@endsection
