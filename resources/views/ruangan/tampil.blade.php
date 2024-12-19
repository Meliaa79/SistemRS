@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
            <h4>List Ruangan</h4>
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href="{{ route('admin.ruangan.tambah') }}">Tambah Ruangan</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
                <!-- Table Section -->
                <div class="table-container mt-4">
                    <table class="datatable table table-bordered table-hover">
                        <thead class="thead-dark">
                    <tr>
                        <th>ID Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruangan as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->nama_ruangan }}</td> <!-- Menampilkan nama ruangan -->
                            <td>{{ $data->kapasitas }}</td> <!-- Menampilkan kapasitas ruangan -->
                            <td>
                                <a href="{{ route('admin.ruangan.edit', $data->id_ruangan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.ruangan.delete', $data->id_ruangan) }}" method="post" style="display:inline;">
                                    @csrf
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
