<!-- Content-Admin -->
@extends('index')
@section('title', 'Menu Admin')
@section('konten')
@section('strip', 'Menu Admin')

<!-- Bootstrap Container -->
<div class="container" style="margin-top: 30px;">
    <div class="row">

        <!-- Form Petugas Baru -->
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Form Petugas Baru</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('register-proses') }}" method="post">
                        @csrf
                        <div class="form-group form-animate-text">
                            <input type="text" class="form-text @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="bar">{{ $errors->first('username') }}</span>
                            @endif
                            <label>Username</label>
                        </div>
                        <br>
                        <div class="form-group form-animate-text">
                            <select name="role_users_id" class="form-control">
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->id }}">{{ $roles->nama_role_user }}</option>
                                @endforeach
                            </select>
                            <label>User Type</label>
                        </div>
                        <br>
                        <div class="form-group form-animate-text">
                            <input type="password" class="form-text @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="bar">{{ $errors->first('password') }}</span>
                            @endif
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn btn-warning right">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Daftar Petugas -->
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Daftar Petugas</h4>
                </div>
                <div class="panel-body" style="max-height: 500px; overflow-y: auto;">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through multiple petugas -->
                                @foreach ($user as $users)
                                    <tr>
                                        <td>{{ $users->username }}</td>
                                        <td>{{ $users->role_users->nama_role_user }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Aktivitas Petugas Parkir -->
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Log Aktivitas</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('delete-proses') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning" style="margin-bottom: 20px;"
                                onclick="return confirm('Apakah Anda Yakin Menghapus Semuanya?')" name="btn_delete">Delete All</button>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Jam Login</th>
                                        <th>Jam Logout</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- looping data log aktivitas --}}
                                    @foreach ($aktivitas as $aktivitases)
                                        <tr>
                                            <td>{{ $aktivitases->user->username }}</td>
                                            <td>{{ $aktivitases->jam_login }}</td>
                                            <td>{{ $aktivitases->jam_logout ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Aktivitas Petugas Parkir -->
@endsection
