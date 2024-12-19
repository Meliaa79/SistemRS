@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
            <h4>@if(auth()->user()->role!='pasien')List Kunjungan Pasien @else Riwayat Kunjungan Pasien @endif</h4>
            <div class="d-flex justify-content-between">
                @if(auth()->user()->role=='admin') 
                <a class="btn btn-primary" href="{{ route('admin.kunjungan_pasien.tambah') }}">Tambah Kunjungan</a>
                @endif
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
                <!-- Table Section -->
                <div class="table-container mt-4">
                    <table class="datatable table table-bordered table-hover">
                        <thead class="thead-dark">
                    <tr>
                        <th>ID Kunjungan</th>
                        <th>Pasien</th>
                        <th>Jadwal</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Diagnosa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kunjungan as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->pasien->nama_pasien }}</td>
                            <td>{{ $data->jadwal->hari_praktek }} ({{ $data->jadwal->jam_mulai }}-{{ $data->jadwal->jam_selesai }})</td>
                            <td>{{ $data->tanggal_kunjungan }}</td>
                            <td>{{ $data->diagnosa }}</td>
                            <td>
                                
                                <a href="@if(auth()->user()->role=='admin'){{ route('admin.kunjungan_pasien.edit', $data->id_kunjungan) }}@elseif (auth()->user()->role=='dokter'){{ route('dokter.kunjungan_pasien.edit', $data->id_kunjungan) }} @else {{ route('pasien.riwayat.detail', $data->id_kunjungan) }} @endif" class="btn btn-sm btn-warning">@if(auth()->user()->role!='pasien')Edit @else Detail @endif</a>
                                @if(auth()->user()->role=='admin')
                                <form action="{{ route('admin.kunjungan_pasien.destroy', $data->id_kunjungan) }}" method="post" style="display:inline;" class="@if(auth()->user()->role!='admin') hidden @endif">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endif
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
