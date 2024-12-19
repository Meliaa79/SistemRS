<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganPasien extends Model
{
    use HasFactory;

    protected $table = 'kunjungan_pasien';
    protected $primaryKey = 'id_kunjungan';

    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'tanggal_kunjungan',
        'diagnosa',
        'id_resep',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalDokter::class, 'id_jadwal');
    }

    public function resep()
    {
        return $this->belongsTo(ResepObat::class, 'id_resep');
    }
}
