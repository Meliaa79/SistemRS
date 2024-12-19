@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Tambah Ruangan</h4>

        <form action="{{ route('admin.ruangan.submit') }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" id="nama_ruangan" required>
            </div>
        
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas" required min="1">
            </div>
        
            <button class="btn btn-primary">Tambah</button>
        </form>
        
    </div>
@endsection
