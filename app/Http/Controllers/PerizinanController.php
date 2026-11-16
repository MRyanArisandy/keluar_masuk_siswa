<?php

namespace App\Http\Controllers;

use App\Models\PerizinanSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PerizinanController extends Controller
{
    /**
     * Ambil seluruh data perizinan siswa.
     */
    public function index(Request $request)
    {
        $query = PerizinanSiswa::query();

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        if ($request->has('nama') && !empty($request->nama)) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->has('tanggal') && !empty($request->tanggal)) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $data = $query->orderBy('tanggal', 'desc')
                      ->orderBy('jam_keluar', 'desc')
                      ->get();

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * Simpan permohonan izin baru dari siswa.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'nisn' => 'nullable|string|max:30',
            'kelas' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'jam_keluar' => 'required|string|max:20',
            'jam_kembali' => 'required|string|max:20',
            'alasan' => 'required|string|max:100',
            'keterangan' => 'nullable|string|max:500',
        ]);

        // Cek proteksi izin ganda: siswa tidak boleh mengajukan izin jika masih ada izin PENDING atau DISETUJUI
        $activePermit = PerizinanSiswa::where('nama', $validated['nama'])
            ->whereIn('status', ['PENDING', 'DISETUJUI'])
            ->first();

        if ($activePermit) {
            return response()->json([
                'success' => false,
                'message' => 'Anda masih memiliki permohonan izin yang berstatus ' . $activePermit->status . '. Harap tunggu proses selesai atau batalkan izin sebelumnya.',
                'active_permit' => $activePermit,
            ], 422);
        }

        $validated['status'] = 'PENDING';
        $permit = PerizinanSiswa::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Permohonan izin keluar berhasil diajukan.',
            'data' => $permit,
        ], 201);
    }

    /**
     * Guru Piket menyetujui / menolak izin.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:DISETUJUI,DITOLAK',
            'guru_piket' => 'nullable|string|max:150',
            'catatan_guru' => 'nullable|string|max:500',
        ]);

        $permit = PerizinanSiswa::findOrFail($id);
        $permit->status = $validated['status'];
        if (!empty($validated['guru_piket'])) {
            $permit->guru_piket = $validated['guru_piket'];
        }
        if (isset($validated['catatan_guru'])) {
            $permit->catatan_guru = $validated['catatan_guru'];
        }
        $permit->save();

        return response()->json([
            'success' => true,
            'message' => 'Status izin berhasil diubah menjadi ' . $permit->status . '.',
            'data' => $permit,
        ]);
    }

    /**
     * Konfirmasi siswa telah kembali ke sekolah (status SELESAI).
     */
    public function konfirmasiKembali(Request $request, $id)
    {
        $permit = PerizinanSiswa::findOrFail($id);
        $permit->status = 'SELESAI';
        $permit->jam_kembali_aktual = Carbon::now('Asia/Jakarta')->format('H:i');
        $permit->save();

        return response()->json([
            'success' => true,
            'message' => 'Siswa telah dikonfirmasi kembali ke sekolah.',
            'data' => $permit,
        ]);
    }

    /**
     * Batalkan pengajuan izin (khusus yang masih PENDING).
     */
    public function batalkan($id)
    {
        $permit = PerizinanSiswa::findOrFail($id);

        if ($permit->status !== 'PENDING') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya permohonan berstatus PENDING yang dapat dibatalkan.',
            ], 422);
        }

        $permit->status = 'DIBATALKAN';
        $permit->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan izin berhasil dibatalkan.',
            'data' => $permit,
        ]);
    }

    /**
     * Statistik rekapitulasi izin.
     */
    public function stats()
    {
        $total = PerizinanSiswa::count();
        $disetujui = PerizinanSiswa::where('status', 'DISETUJUI')->count();
        $ditolak = PerizinanSiswa::where('status', 'DITOLAK')->count();
        $selesai = PerizinanSiswa::where('status', 'SELESAI')->count();
        $pending = PerizinanSiswa::where('status', 'PENDING')->count();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'disetujui' => $disetujui,
                'ditolak' => $ditolak,
                'selesai' => $selesai,
                'pending' => $pending,
            ],
        ]);
    }
}
