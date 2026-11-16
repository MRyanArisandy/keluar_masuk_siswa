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
        Schema::create('perizinan_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->nullable();
            $table->string('kelas');
            $table->date('tanggal');
            $table->string('jam_keluar');
            $table->string('jam_kembali');
            $table->string('jam_kembali_aktual')->nullable();
            $table->string('alasan');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['PENDING', 'DISETUJUI', 'DITOLAK', 'SELESAI', 'DIBATALKAN'])->default('PENDING');
            $table->string('guru_piket')->nullable();
            $table->text('catatan_guru')->nullable();
            $table->timestamps();

            $table->index(['tanggal', 'status']);
            $table->index('nisn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinan_siswa');
    }
};
