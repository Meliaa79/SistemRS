<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Dokter;
use App\Models\KunjunganPasien;
use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\Pasien;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class KunjunganPasienController extends Controller
{
    public function index()
    {
        $kunjungan = KunjunganPasien::all();
        if(auth()->user()->role=='dokter'){
            $jadwal_list = JadwalDokter::where('id_dokter',auth()->user()->dokter->id_dokter)->pluck('id_jadwal')->toArray();
            
            $kunjungan = KunjunganPasien::whereIn('id_jadwal',$jadwal_list)->get();
        }
        if(auth()->user()->role=='pasien'){
            $kunjungan = KunjunganPasien::where('id_pasien','=',auth()->user()->pasien->id_pasien)->get();
        }

        return view('kunjungan_pasien.tampil', compact('kunjungan'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $jadwal = JadwalDokter::all();
        $dokter = Dokter::all();
        return view('kunjungan_pasien.tambah', compact('pasien','jadwal','dokter'));
    }

    public function store(Request $request)
    {
        
        $data = new KunjunganPasien();
        $data->id_pasien = $request->id_pasien;
        $data->id_jadwal = $request->id_jadwal;
        $data->tanggal_kunjungan = $request->tanggal_kunjungan;
        $data->save();
        return redirect()->route('kunjungan_pasien.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kunjungan = KunjunganPasien::findOrFail($id);
        $pasien = Pasien::all();
        $jadwal = JadwalDokter::all();
        $resep = ResepObat::all();
        $dokter = Dokter::all();
        $obat = Obat::all();
        $id_dokter = $kunjungan->jadwal->dokter->id_dokter;
        
        if($kunjungan->id_resep==null){
            $resep_id = new ResepObat();
            $resep_id->id_dokter = $id_dokter;
            $resep_id->tanggal_resep = now();
            $resep_id->save();
            $kunjungan->id_resep = $resep_id->id_resep;
            $kunjungan->save();
        }
        $kunjungan->id_dokter = $kunjungan->jadwal->dokter->id_dokter;
        $obats = DetailResep::where('id_resep','=',$kunjungan->id_resep)->get();
        return view('kunjungan_pasien.edit', compact('kunjungan','pasien','jadwal','resep','dokter','obats','obat'));
    }

    public function update(Request $request, $id)
    {

        $kunjungan = KunjunganPasien::findOrFail($id);
        $kunjungan->update($request->all());
        return redirect()->route('kunjungan_pasien.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kunjungan = KunjunganPasien::findOrFail($id);
        $kunjungan->delete();
        return redirect()->route('kunjungan_pasien.index')->with('success', 'Data berhasil dihapus.');
    }

    public function resep(Request $request,$id_kunjungan)
    {
        $kunjungan = KunjunganPasien::find($id_kunjungan);
        $data = new DetailResep();
        $data->id_resep = $kunjungan->id_resep;
        $data->id_obat = $request->id_obat;
        $data->dosis = $request->dosis;
        $data->jumlah = $request->jumlah;
        $data->save();
        return redirect()->route('dokter.kunjungan_pasien.edit',$kunjungan->id_kunjungan)->with('success', 'Data berhasil diubah');
    }

    public function destroy_resep($id)
    {
        $kunjungan = DetailResep::findOrFail($id);
        $kunjungan->delete();
        return redirect()->route('dokter.kunjungan_pasien.edit',$kunjungan->id_kunjungan)->with('success', 'Data berhasil dihapus');
    }

    public function resep_siap($id_kunjungan)
    {
        $kunjungan = KunjunganPasien::findOrFail($id_kunjungan);
        $resepObat = $kunjungan->resep;
        $resepObat->status ='selesai';
        $resepObat->save();
        return redirect()->route('apoteker.resep.edit',$kunjungan->id_kunjungan)->with('success', 'Data berhasil diproses');
    }
}


