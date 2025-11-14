<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();


            $table->string('nama_konsumen');
            $table->string('nik', 16);
            $table->date('tgl_lahir');
            $table->string('status_perkawinan');
            $table->string('nama_pasangan')->nullable();


            $table->string('dealer');
            $table->string('merk_kendaraan');
            $table->string('model_kendaraan');
            $table->string('tipe_kendaraan');
            $table->string('warna_kendaraan');
            $table->decimal('harga_kendaraan', 15, 2); // Misal: 15 digit total, 2 desimal


            $table->string('asuransi');
            $table->decimal('down_payment', 15, 2);
            $table->integer('lama_kredit_bulan');
            $table->decimal('angsuran_per_bulan', 15, 2);


            $table->string('file_ktp')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_bukti_bayar')->nullable();
            $table->string('file_form_aplikasi')->nullable();


            $table->string('status')->default('Submitted');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
