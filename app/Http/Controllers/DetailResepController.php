<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\ResepObat;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailResepController extends Controller
{
    public function index()
    {
        $detailResep = DetailResep::all();
        return view('detail_resep.tampil', compact('detailResep'));
    }

    public function create()
    {
        $resep = ResepObat::all();
        $obat = Obat::all();
        return view('detail_resep.tambah', compact('resep','obat'));
    }

    public function store(Request $request)
    {

        DetailResep::create($request->all());
        return redirect()->route('detail_resep.index')->with('success', 'Detail resep berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $detailResep = DetailResep::findOrFail($id);
        $resep = ResepObat::all();
        $obat = Obat::all();
        return view('detail_resep.edit', compact('detailResep','resep','obat'));
    }

    public function update(Request $request, $id)
    {

        $detailResep = DetailResep::findOrFail($id);
        $detailResep->update($request->all());
        return redirect()->route('detail_resep.index')->with('success', 'Detail resep berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detailResep = DetailResep::findOrFail($id);
        $detailResep->delete();
        return redirect()->route('detail_resep.index')->with('success', 'Detail resep berhasil dihapus.');
    }
}
