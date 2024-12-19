@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
            <h4 class="text-center mb-4">Edit dokter</h4>

        <form action="{{ route('admin.dokter.update', $dokter->id_dokter) }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_dokter" class="form-label">Nama dokter</label>
                <input type="text" name="nama_dokter" value="{{ $dokter->nama_dokter }}" class="form-control"
                    id="nama_dokter" required>
            </div>
            <div class="mb-3">
                <label>Alamat Email</label>
                <input type="text" name="email" class="form-control mb-2" value="{{ $pasien->user->email }}">
            </div>
            <div class="mb-3">
                <label>Password (kosongkan jika tidak ingin mengganti)</label>
                <input type="password" name="password" class="form-control mb-2 ">
            </div>
            <div class="mb-3">
                <label for="spesialis" class="form-label">Spesialis</label>
                <input type="text" name="spesialis" value="{{ $dokter->spesialis }}" class="form-control" id="spesialis"
                    required>
            </div>

            <button class="btn btn-primary">Edit Dokter</button>
        </form>
    </div>
@endsection
