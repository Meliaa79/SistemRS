@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Tambah Pasien</h4>

        <form action="{{ route('admin.pasien.submit') }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
            </div>
            <div class="mb-3">
                <label>Alamat Email</label>
                                    <input type="text" name="email" class="form-control mb-2">
            </div>
            <div class="mb-3">
                <label>Password</label>
                                    <input type="password" name="password" class="form-control mb-2">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
