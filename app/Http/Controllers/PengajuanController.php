<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    /**
     * Menampilkan daftar pengajuan yang sudah disubmit
     * (Ini untuk "Atasan Marketing" / "Admin Backoffice")
     */
    public function index()
    {
        $semuaPengajuan = Pengajuan::latest()->get();
        return view('pengajuan.index', compact('semuaPengajuan'));
    }

    /**
     * Menampilkan form untuk submit data (Langkah 4)
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Menyimpan data pengajuan baru (Logika Langkah 4)
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            // Data Konsumen
            'nama_konsumen' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'tgl_lahir' => 'required|date',
            'status_perkawinan' => 'required|string',
            'nama_pasangan' => 'nullable|string|max:255',
            // Data Kendaraan
            'dealer' => 'required|string|max:255',
            'merk_kendaraan' => 'required|string|max:255',
            'model_kendaraan' => 'required|string|max:255',
            'tipe_kendaraan' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
            'harga_kendaraan' => 'required|numeric|min:0',
            // Data Pinjaman
            'asuransi' => 'required|string|max:255',
            'down_payment' => 'required|numeric|min:0',
            'lama_kredit_bulan' => 'required|integer|min:1',
            'angsuran_per_bulan' => 'required|numeric|min:0',
            // Dokumen
            'file_ktp' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'file_kk' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'file_bukti_bayar' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'file_form_aplikasi' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // 2. Handle File Upload
        $filePaths = [];
        $filesToUpload = ['file_ktp', 'file_kk', 'file_bukti_bayar', 'file_form_aplikasi'];

        foreach ($filesToUpload as $fileKey) {
            if ($request->hasFile($fileKey)) {
                // Simpan file ke storage/app/public/dokumen
                $path = $request->file($fileKey)->store('dokumen', 'public');
                $filePaths[$fileKey] = $path;
            }
        }

        // 3. Gabungkan data validasi dan path file
        $dataToCreate = array_merge($validatedData, $filePaths);
        $dataToCreate['status'] = 'Submitted'; // Status awal

        // 4. Simpan ke Database
        Pengajuan::create($dataToCreate);

        // 5. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengajuan.index')
            ->with('success', 'Data pengajuan berhasil disubmit!');
    }
}
