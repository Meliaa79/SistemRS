@extends('layouts.app')

@section('content')
<div class="d-flex ">
    <div class="w-100">
        <div class="container w-100">
            <h4>List Dokter</h4>
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href="{{ route('admin.dokter.tambah') }}">Tambah Dokter</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
                <!-- Table Section -->
                <div class="table-container mt-4">
                    <table class="datatable table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Email</th>
                                <th>Spesialis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $no => $data)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->nama_dokter }}</td>  <!-- Menampilkan nama dokter -->
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->spesialis }}</td> <!-- Menampilkan spesialis -->
                                    <td>
                                        <a href="{{ route('admin.dokter.edit', $data->id_dokter) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.dokter.delete', $data->id_dokter) }}" method="post" style="display:inline;">
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
    </div>
</div>
    

@endsection
