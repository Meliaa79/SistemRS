<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\JadwalDokter;
use App\Models\Dokter;
use App\Models\KunjunganPasien;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwal = JadwalDokter::all();
        return view('jadwal_dokter.tampil', compact('jadwal'));
    }
    public function index_dokter()
    {
        $jadwal = JadwalDokter::where('id_dokter', '=', auth()->user()->dokter->id_dokter)->get();
        return view('jadwal_dokter.tampil', compact('jadwal'));
    }
    public function getJadwalByDokter($id_dokter)
    {
        $jadwal = JadwalDokter::where('id_dokter', $id_dokter)->get();
        // Return the jadwal as JSON response
        return response()->json(['jadwal' => $jadwal]);
    }


    public function create()
    {
        $dokter = Dokter::all();
        return view('jadwal_dokter.tambah', compact('dokter'));
    }

    public function store(Request $request)
    {

        JadwalDokter::create($request->all());
        return redirect()->route('admin.jadwal_dokter.index')->with('success', 'Data berhasil ditambah');
    }
    

    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $dokter = Dokter::all();
        return view('jadwal_dokter.edit', compact('jadwal', 'dokter'));
    }

    public function update(Request $request, $id)
    {

        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->update($request->all());
        if(auth()->user()->role=='admin'){
            return redirect()->route('admin.jadwal_dokter.index')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('dokter.jadwal_dokter.index')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('admin.jadwal_dokter.index')->with('success', 'Data berhasil dihapus');
    }
}
