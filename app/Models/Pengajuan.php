<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_konsumen',
        'nik',
        'tgl_lahir',
        'status_perkawinan',
        'nama_pasangan',
        'dealer',
        'merk_kendaraan',
        'model_kendaraan',
        'tipe_kendaraan',
        'warna_kendaraan',
        'harga_kendaraan',
        'asuransi',
        'down_payment',
        'lama_kredit_bulan',
        'angsuran_per_bulan',
        'file_ktp',
        'file_kk',
        'file_bukti_bayar',
        'file_form_aplikasi',
        'status',
    ];
}
