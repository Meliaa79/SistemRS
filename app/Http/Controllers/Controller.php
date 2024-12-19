<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\KunjunganPasien;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\ResepObat;
use App\Models\Ruangan;

class Controller
{
    public function home(){
        return view('home');
    }

    public function dashboard(){
        $totalDokter = Dokter::count();
        $totalPasien = Pasien::count();
        $totalObat = Obat::count();
        $totalResep = ResepObat::count();
        $totalJadwalDokter = JadwalDokter::count();
        $totalDetailResep = DetailResep::count();
        $totalKunjungan = KunjunganPasien::count();
        $totalRuangan=Ruangan::count();
        return view('admin.dashboard',compact('totalDokter','totalPasien','totalObat','totalResep','totalJadwalDokter','totalDetailResep','totalKunjungan','totalRuangan'));
    }
    public function dokter_dashboard(){
        $total_jadwal_mingguan = JadwalDokter::where('id_dokter', auth()->user()->dokter->id_dokter)->count();
        $list_id_jadwal = JadwalDokter::where('id_dokter', auth()->user()->dokter->id_dokter)->pluck('id_jadwal')->toArray();
        $total_kunjungan_pasien = KunjunganPasien::whereIn('id_jadwal',$list_id_jadwal)->count();
        return view('dokter_view.dashboard',compact('total_jadwal_mingguan','total_kunjungan_pasien'));
    }
    public function apoteker_dashboard(){
        $total_obat = Obat::count();
        $total_resep = ResepObat::count();
        return view('apoteker_view.dashboard',compact('total_obat','total_resep'));
    }
}
