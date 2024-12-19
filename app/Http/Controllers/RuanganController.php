<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    function tampil() {
        $ruangan = Ruangan::get();

        return view('ruangan.tampil', compact('ruangan'));
    }
    function tambah()  {
        return view('ruangan.tambah');
    }
    function submit(Request $request )  {
        
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kapasitas = $request->kapasitas;
        $ruangan->save();

        return redirect()->route('admin.ruangan.tampil')->with('success', 'Data berhasil ditambah');
    }
    function edit($id_ruangan) {
        $ruangan = Ruangan::find($id_ruangan);
        return view('ruangan.edit', compact('ruangan'));
    }
    function update(Request $request, $id_ruangan) {
        $ruangan = Ruangan::find($id_ruangan);
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kapasitas = $request->kapasitas;
        $ruangan->update();

        return redirect()->route('admin.ruangan.tampil')->with('success', 'Data berhasil diubah');
    }
    function delete($id_ruangan) {
        $ruangan = Ruangan::find($id_ruangan);
        $ruangan->delete();
        return redirect()->route('admin.ruangan.tampil')->with('success', 'Data berhasil dihapus');
    }
}
