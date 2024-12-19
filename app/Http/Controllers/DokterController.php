<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DokterController extends Controller
{
    function tampil() {
        $dokter = Dokter::get();
        return view('dokter.tampil', compact('dokter'));
    }
    function tambah()  {
        return view('dokter.tambah');
    }
    function submit(Request $request )  {
        $request->validate([
            'nama_dokter' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);
        $user = new User();
        $user->name = $request->nama_dokter;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'dokter'; 
        $user->save();
        $dokter = new Dokter();
        $dokter->user_id = $user->id;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->save();

        return redirect()->route('admin.dokter.tampil')->with('success', 'Data berhasil ditambah');
    }
    function edit($id_dokter) {
        $dokter = Dokter::find($id_dokter);
        return view('dokter.edit', compact('dokter'));
    }
    function update(Request $request, $id_dokter) {
        $dokter = Dokter::find($id_dokter);
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->update();
        $request->validate([
            'email' => 'required|email|unique:users'.($dokter->user ? ",email,{$dokter->user->id}" : ''),
        ]);
        $user = $dokter->user;
        $user->name = $request->nama_dokter;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('admin.dokter.tampil')->with('success', 'Data berhasil diubah.');
    }
    function delete($id_dokter) {
        $dokter = Dokter::find($id_dokter);
        $dokter->user->delete();
        $dokter->delete();
        return redirect()->route('admin.dokter.tampil')->with('success', 'Data berhasil dihapus');
    }

}
