<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanSiswa extends Model
{
    use HasFactory;

    protected $table = 'perizinan_siswa';

    protected $fillable = [
        'nama',
        'nisn',
        'kelas',
        'tanggal',
        'jam_keluar',
        'jam_kembali',
        'jam_kembali_aktual',
        'alasan',
        'keterangan',
        'status',
        'guru_piket',
        'catatan_guru',
    ];

    protected $casts = [
        'tanggal' => 'date:Y-m-d',
    ];
}
