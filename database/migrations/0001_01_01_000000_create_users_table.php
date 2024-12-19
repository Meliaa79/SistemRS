<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'dokter', 'pasien','apoteker'])->default('pasien');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        // Tabel kunjungan_pasien
        Schema::create('kunjungan_pasien', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_jadwal');
            $table->date('tanggal_kunjungan');
            $table->text('diagnosa');
            $table->unsignedBigInteger('id_resep');
            $table->timestamps();
        });

        // Tabel jadwal_dokter
        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->unsignedBigInteger('id_dokter');
            $table->string('hari_praktek', 30);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });

        // Tabel detail_resep
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_resep');
            $table->unsignedBigInteger('id_obat');
            $table->string('dosis', 50);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('kunjungan_pasien');
        Schema::dropIfExists('jadwal_dokter');
        Schema::dropIfExists('detail_resep');
    }
};
