@extends('resep_obat.layout')

@section('konten')
    <div class="container">
        <h4 class="text-center mb-4">Tambah Resep Obat</h4>

        <form action="{{ route('resep_obat.submit') }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="id_dokter" class="form-label">Pilih Dokter</label>
                <select name="id_dokter" class="form-control" id="id_dokter" required>
                    <option value="" disabled selected>-- Pilih Dokter --</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama_dokter }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_resep" class="form-label">Tanggal Resep</label>
                <input type="date" name="tanggal_resep" class="form-control" id="tanggal_resep" required>
            </div>

            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
