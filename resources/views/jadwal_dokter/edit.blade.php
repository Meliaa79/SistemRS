@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Edit Jadwal Dokter</h4>

        <form action="{{ route('admin.jadwal_dokter.update',$jadwal->id_jadwal) }}" method="POST" class="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Dokter</label>
                <select name="id_dokter" class="form-control" id="nama_pasien" required>
                    <?php foreach($dokter as $d){?>
                    <option value="<?=$d->id_dokter?>"><?=$d->nama_dokter?></option>
                    <?php }?>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Hari Praktek</label>
                <select name="hari_praktek" class="form-control" id="hari_praktek" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" id="jam_mulai" value="<?=$jadwal->jam_mulai?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" id="jam_selesai" value="<?=$jadwal->jam_selesai?>" required>
            </div>


            <button class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection
