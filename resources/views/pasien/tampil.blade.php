@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
            <h4>List Pasien</h4>
            <div class="d-flex justify-content-between">
                @if(auth()->user()->role=='admin')
                <a class="btn btn-primary" href="{{ route('admin.pasien.tambah') }}">Tambah Pasien</a>
                @endif
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
                <!-- Table Section -->
                <div class="table-container mt-4">
                    <table class="datatable table table-bordered table-hover">
                        <thead class="thead-dark">
                    <tr>
                        <th>ID Pasien</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        @if(auth()->user()->role=='admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->nama_pasien }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            @if(auth()->user()->role=='admin')
                            <td>
                                <a href="{{ route('admin.pasien.edit', $data->id_pasien) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.pasien.delete', $data->id_pasien) }}" method="post" style="display:inline;">
                                    @csrf
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
@endsection
