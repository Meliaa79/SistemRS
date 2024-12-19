<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan default
    protected $table = 'ruangan';

    // Tentukan primary key yang benar
    protected $primaryKey = 'id_ruangan';

    // Pastikan auto-increment jika diperlukan
    public $incrementing = true;
    
    // Tentukan tipe primary key jika bukan integer
    protected $keyType = 'int';

    // Tentukan timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;
}

