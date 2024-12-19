<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;

class PasienController extends Controller
{
    function tampil() {
        $pasien = Pasien::get();
        if(auth()->user()->roel=='dokter'){
            $pasien_id_list = JadwalDokter::where('id_dokter','=',auth()->user()->dokter->id_dokter)->kunjunganPasien()->pluck('id_pasien')->toArray();
            $pasien=Pasien::whereIn('id_pasien',$pasien_id_list)->get();
        }
        return view('pasien.tampil', compact('pasien'));
    }
    function tambah()  {
        return view('pasien.tambah');
    }
    function submit(Request $request )  {
        $request->validate([
            'nama_pasien' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);
        $user = new User();
        $user->name = $request->nama_pasien;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'pasien'; 
        $user->save();
        $pasien = new Pasien();
        $pasien->user_id = $user->id;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->save();

        return redirect()->route('admin.pasien.tampil')->with('success', 'Data berhasil ditambah');
    }
    function edit($id_pasien) {
        $pasien = Pasien::find($id_pasien);
        return view('pasien.edit', compact('pasien'));
    }
    function update(Request $request, $id_pasien) {
        $pasien = Pasien::find($id_pasien);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->update();
        $request->validate([
            'email' => 'required|email|unique:users'.($pasien->user ? ",email,{$pasien->user->id}" : ''),
        ]);
        $user = $pasien->user;
        $user->name = $request->nama_pasien;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.pasien.tampil')->with('success', 'Data berhasil diubah');
    }
    function delete($id_pasien) {
        $pasien = Pasien::find($id_pasien);
        $pasien->user->delete();
        $pasien->delete();
        return redirect()->route('admin.pasien.tampil')->with('success', 'Data berhasil dihapus');
    }
}
