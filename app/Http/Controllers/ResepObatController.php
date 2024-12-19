<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use App\Models\Dokter;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    // Menampilkan daftar resep obat
    function tampil() {
        $resep = ResepObat::with('dokter')->get();  // Mengambil data resep beserta dokter yang terkait
        return view('resep_obat.tampil', compact('resep'));
    }

    // Menampilkan form tambah resep obat
    function tambah()  {
        $dokters = Dokter::all();  // Mengambil semua data dokter untuk dipilih
        return view('resep_obat.tambah', compact('dokters'));
    }

    // Menyimpan data resep obat
    function submit(Request $request)  {
        $resep = new ResepObat();
        $resep->id_dokter = $request->id_dokter;  // Menyimpan foreign key ke dokter
        $resep->tanggal_resep = $request->tanggal_resep;
        $resep->save();

        return redirect()->route('resep_obat.tampil');  // Redirect ke halaman daftar resep
    }

    // Menampilkan form untuk edit resep obat
    function edit($id_resep) {
        $resep = ResepObat::find($id_resep);  // Mencari resep berdasarkan ID
        $dokters = Dokter::all();  // Mengambil semua data dokter untuk dipilih
        return view('resep_obat.edit', compact('resep', 'dokters'));
    }

    // Mengupdate data resep obat
    function update(Request $request, $id_resep) {
        $resep = ResepObat::find($id_resep);
        $resep->id_dokter = $request->id_dokter;
        $resep->tanggal_resep = $request->tanggal_resep;
        $resep->update();

        return redirect()->route('resep_obat.tampil');  // Redirect ke halaman daftar resep
    }

    // Menghapus data resep obat
    function delete($id_resep) {
        $resep = ResepObat::find($id_resep);
        $resep->delete();  // Menghapus resep berdasarkan ID
        return redirect()->route('resep_obat.tampil');  // Redirect ke halaman daftar resep
    }
}
