@extends('jadwal_dokter.layout')

@section('konten')
    <div class="container">
        <h4 class="text-center mb-4">Edit Detail Resep</h4>

        <form action="{{ route('detail_resep.update',$detailResep->id_detail) }}" method="POST" class="post">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">ID Resep</label>
                <select name="id_resep" class="form-control" id="id_resep" required>
                    <?php foreach($resep as $d){?>
                    <option value="<?=$d->id_resep?>"><?=$d->id_resep?></option>
                    <?php }?>
                </select>
            </div>

            
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Obat</label>
                <select name="id_obat" class="form-control" id="id_obat" required>
                    <?php foreach($obat as $d){?>
                    <option value="<?=$d->id_obat?>"><?=$d->nama_obat?></option>
                    <?php }?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Dosis</label>
                <input type="" name="dosis" class="form-control" id="dosis" value="<?=$detailResep->dosis?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?=$detailResep->jumlah?>" required>
            </div>


            <button class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection
