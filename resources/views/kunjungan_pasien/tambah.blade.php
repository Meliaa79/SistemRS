@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
        <h4 class="text-center mb-4">Tambah Kunjungan Pasien</h4>

        <form action="{{ route('admin.kunjungan_pasien.store') }}" method="POST" class="post">
            @csrf
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Pasien</label>
                <select name="id_pasien" class="form-control" id="id_pasien" required>
                    <?php foreach($pasien as $d){?>
                    <option value="<?=$d->id_pasien?>"><?=$d->nama_pasien?></option>
                    <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_dokter" class="form-label">Dokter</label>
                <select name="id_dokter" class="form-control" id="id_dokter" required>
                    <?php foreach($dokter as $d){?>
                    <option value="<?=$d->id_dokter?>"><?=$d->nama_dokter?></option>
                    <?php }?>
                </select>
            </div>

            
            <div class="mb-3">
                <label for="id_jadwal" class="form-label">Jadwal</label>
                <select name="id_jadwal" class="form-control" id="id_jadwal" required>
                    <?php foreach($jadwal as $d){?>
                    <option value="<?=$d->id_jadwal?>">{{ $d->hari_praktek }} ({{ $d->jam_mulai }}-{{ $d->jam_selesai }})</option>
                    <?php }?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" id="tanggal_kunjungan" required>
            </div>

            <div class="mb-3">
                <label for="diagnosa" class="form-label">Diagnosa</label>
                <textarea name="diagnosa" class="form-control" id="diagnosa" @if(auth()->user()->role!='dokter') readonly @endif></textarea>
            </div>
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
    $('#id_dokter').on('change', function() {
        var dokterId = $(this).val(); 
        if(dokterId) {
            $.ajax({
                url: 'admin/jadwal_dokter/' + dokterId,
                type: 'GET',
                success: function(response) {
                    $('#id_jadwal').empty();
                    response.jadwal.forEach(function(jadwal) {
                        $('#id_jadwal').append('<option value="' + jadwal.id_jadwal + '">' + jadwal.hari_praktek + ' (' + jadwal.jam_mulai + '-' + jadwal.jam_selesai + ')</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching jadwal:', error);
                }
            });
        }
    });
});

</script>
@endpush
