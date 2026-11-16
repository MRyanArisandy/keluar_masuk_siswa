<?php

namespace Database\Seeders;

use App\Models\PerizinanSiswa;
use Illuminate\Database\Seeder;

class PerizinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Andi Saputra',
                'nisn' => '0076543210',
                'kelas' => 'XII RPL',
                'alasan' => 'Keperluan Keluarga',
                'jam_keluar' => '10:15',
                'jam_kembali' => '12:00',
                'status' => 'DISETUJUI',
                'tanggal' => '2025-06-16',
                'keterangan' => 'Ada keperluan mendesak keluarga di rumah.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Budi Santoso',
                'nisn' => '0076543211',
                'kelas' => 'X TKR',
                'alasan' => 'Keperluan Pribadi',
                'jam_keluar' => '11:00',
                'jam_kembali' => '13:00',
                'status' => 'PENDING',
                'tanggal' => '2025-06-16',
                'keterangan' => 'Mengambil berkas penting di kantor pos.',
                'guru_piket' => null,
            ],
            [
                'nama' => 'Siti Aisyah',
                'nisn' => '0076543212',
                'kelas' => 'XI TKJ',
                'alasan' => 'Keperluan Berobat',
                'jam_keluar' => '09:30',
                'jam_kembali' => '11:30',
                'status' => 'DISETUJUI',
                'tanggal' => '2025-06-16',
                'keterangan' => 'Periksa gigi ke puskesmas.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Dinda Ayu',
                'nisn' => '0076543213',
                'kelas' => 'XI AKL',
                'alasan' => 'Mengantar Orang Tua',
                'jam_keluar' => '10:45',
                'jam_kembali' => '12:45',
                'status' => 'DITOLAK',
                'tanggal' => '2025-06-16',
                'keterangan' => 'Bisa diantar setelah jam pelajaran selesai.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Rizky Pratama',
                'nisn' => '0076543214',
                'kelas' => 'XII RPL',
                'alasan' => 'Periksa Kesehatan',
                'jam_keluar' => '08:15',
                'jam_kembali' => '10:15',
                'jam_kembali_aktual' => '10:10',
                'status' => 'SELESAI',
                'tanggal' => '2025-06-16',
                'keterangan' => 'Selesai berobat ke klinik.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nisn' => '0076543215',
                'kelas' => 'XI RPL',
                'alasan' => 'Tugas / Lomba Sekolah',
                'jam_keluar' => '08:00',
                'jam_kembali' => '14:00',
                'status' => 'DISETUJUI',
                'tanggal' => '2025-06-20',
                'keterangan' => 'Lomba FLS2N tingkat kabupaten.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Nadia Rahma',
                'nisn' => '0076543216',
                'kelas' => 'X AKL',
                'alasan' => 'Keperluan Berobat',
                'jam_keluar' => '09:15',
                'jam_kembali' => '11:15',
                'jam_kembali_aktual' => '11:00',
                'status' => 'SELESAI',
                'tanggal' => '2025-06-20',
                'keterangan' => 'Konsultasi dokter.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Doni Kurniawan',
                'nisn' => '0076543217',
                'kelas' => 'XI TKJ',
                'alasan' => 'Keperluan Pribadi',
                'jam_keluar' => '10:30',
                'jam_kembali' => '12:30',
                'status' => 'DITOLAK',
                'tanggal' => '2025-06-10',
                'keterangan' => 'Alasan kurang mendesak.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Maya Sandi',
                'nisn' => '0076543218',
                'kelas' => 'XII MM',
                'alasan' => 'Tugas / Lomba Sekolah',
                'jam_keluar' => '11:00',
                'jam_kembali' => '13:00',
                'status' => 'DISETUJUI',
                'tanggal' => '2025-06-05',
                'keterangan' => 'Bimbingan dan verifikasi berkas magang industri.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'nisn' => '0076543219',
                'kelas' => 'X TKR',
                'alasan' => 'Keperluan Pribadi',
                'jam_keluar' => '09:00',
                'jam_kembali' => '11:00',
                'jam_kembali_aktual' => '10:45',
                'status' => 'SELESAI',
                'tanggal' => '2025-06-05',
                'keterangan' => 'Ambil berkas SIM di satlantas.',
                'guru_piket' => 'Drs. Bambang Haryono',
            ],
        ];

        foreach ($data as $item) {
            PerizinanSiswa::create($item);
        }
    }
}
