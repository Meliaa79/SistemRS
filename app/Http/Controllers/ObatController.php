<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    function tampil() {
        $obat = Obat::get();
        return view('obat.tampil', compact('obat'));
    }
    function tambah()  {
        return view('obat.tambah');
    }
    function submit(Request $request )  {
        $obat = new Obat();
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->harga = $request->harga;
        $obat->save();

        return redirect()->route('apoteker.obat.tampil')->with('success', 'Data berhasil ditambah');
    }
    function edit($id_obat) {
        $obat = Obat::find($id_obat);
        return view('obat.edit', compact('obat'));
    }
    function update(Request $request, $id_obat) {
        $obat = Obat::find($id_obat);
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->harga = $request->harga;
        $obat->update();

        return redirect()->route('apoteker.obat.tampil')->with('success', 'Data berhasil diubah');
    }
    function delete($id_obat) {
        $obat = Obat::find($id_obat);
        $obat->delete();
        return redirect()->route('apoteker.obat.tampil')->with('success', 'Data berhasil dihapus');
    }
}
