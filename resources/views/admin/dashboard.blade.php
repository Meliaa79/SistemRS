@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 text-center">
    <div class="w-100">
        <div class="container w-100">
            <div class="text-start">
                <h2> Selamat Datang, {{auth()->user()->name}}</h2>
                <hr class="mb-5">
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Data Dokter</div>
                                <div class="h6">{{$totalDokter}}</div>
                            </div>
                            <i class="fas fa-user-md icon pink-bg"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Data Pasien</div>
                                <div class="h6">{{$totalPasien}}</div>
                            </div>
                            <i class="fas fa-procedures icon yellow-bg"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Jadwal Dokter</div>
                                <div class="h6">{{$totalJadwalDokter}}</div>
                            </div>
                            <i class="fas fa-calendar-alt icon green-bg"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Data Ruangan</div>
                                <div class="h6">{{$totalRuangan}}</div>
                            </div>
                            <i class="fas fa-building icon blue-bg"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Data Kunjungan</div>
                                <div class="h6">{{$totalKunjungan}}</div>
                            </div>
                            <i class="fas fa-calendar-check icon pink-bg"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Data Obat</div>
                                <div class="h6">{{$totalObat}}</div>
                            </div>
                            <i class="fas fa-capsules icon yellow-bg"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Resep Obat</div>
                                <div class="h6">{{$totalResep}}</div>
                            </div>
                            <i class="fas fa-prescription-bottle-alt icon green-bg"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h5">Detail Resep</div>
                                <div class="h6">{{$totalDetailResep}}</div>
                            </div>
                            <i class="fas fa-file-prescription icon blue-bg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection