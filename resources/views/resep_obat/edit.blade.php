@extends('detail_resep.layout')

@section('konten')
    <div class="container">
        <h4 class="text-center mb-4">Edit Detail Resep Obat</h4>

        <form action="{{ route('detail_resep.update', $detail_resep->id_detail) }}" method="POST" class="post">
            @csrf
            @method('PUT') <!-- Menyatakan bahwa ini adalah update (PUT) request -->

            <div class="mb-3">
                <label for="id_resep" class="form-label">Pilih Resep Obat</label>
                <select name="id_resep" class="form-control" id="id_resep" required>
                    @foreach ($reseps as $resep)
                        <option value="{{ $resep->id_resep }}" {{ $resep->id_resep == $detail_resep->id_resep ? 'selected' : '' }}>
                            {{ $resep->id_resep }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_obat" class="form-label">Pilih Obat</label>
                <select name="id_obat" class="form-control" id="id_obat" required>
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id_obat }}" {{ $obat->id_obat == $detail_resep->id_obat ? 'selected' : '' }}>
                            {{ $obat->nama_obat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" name="dosis" value="{{ $detail_resep->dosis }}" class="form-control" id="dosis" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" value="{{ $detail_resep->jumlah }}" class="form-control" id="jumlah" required>
            </div>

            <button class="btn btn-warning">Update Detail Resep</button>
        </form>
    </div>
@endsection
