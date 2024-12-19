@extends('detail_resep.layout')

@section('konten')
    <div class="content">
        <div class="header">
            <h4>List Detail Resep Dokter</h4>
            <div class="ms-auto">
                <a class="btn btn-primary" href="{{ route('detail_resep.create') }}">Tambah Detail Resep</a>
            </div>
        </div>

        <!-- Tombol Kembali ke Beran`da -->
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>

        <div class="table-container mt-4">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Detail</th>
                        <th>ID Resep</th>
                        <th>Obat</th>
                        <th>Dosis</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailResep as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->resep->id_resep }}</td>
                            <td>{{ $data->obat->nama_obat }}</td>
                            <td>{{ $data->dosis }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>
                                <a href="{{ route('detail_resep.edit', $data->id_detail) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('detail_resep.destroy', $data->id_detail) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .content {
            margin-left: 240px;
            padding: 20px;
            padding-top: 110px;
        }

        .header {
            background-color: #ffffff;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h4 {
            font-size: 24px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #0A2558;
            color: white;
            border: none;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1a355e;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-radius: 8px;
        }

        .thead-dark {
            background-color: #0A2558;
            color: #fff;
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
        }

        .table-bordered {
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            margin-top: 30px;
        }
    </style>
@endsection
