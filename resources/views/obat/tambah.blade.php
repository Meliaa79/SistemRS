@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Tambah Obat</h4>

        <form action="{{ route('apoteker.obat.submit') }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat" required>
            </div>

            <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat</label>
                <input type="text" name="jenis_obat" class="form-control" id="jenis_obat" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" step="0.01" required>
            </div>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
