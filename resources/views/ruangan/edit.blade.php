@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Edit Ruangan</h4>

        <form action="{{ route('admin.ruangan.update', $ruangan->id_ruangan) }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" class="form-control"
                    id="nama_ruangan" required>
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" value="{{ $ruangan->kapasitas }}" class="form-control" id="kapasitas"
                    required>
            </div>

            <button class="btn btn-primary">Edit Ruangan</button>
        </form>
    </div>
@endsection
