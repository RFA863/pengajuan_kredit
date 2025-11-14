<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Data Pengajuan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h2>Formulir Pengajuan Kredit (Langkah 4)</h2>
        <p>Silakan isi data berikut sesuai dengan dokumen fisik.</p>

        @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops! Ada beberapa masalah:</strong>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card mb-4">
            <div class="card-header">Data Konsumen</div>
            <div class="card-body row g-3">
              <div class="col-md-6">
                <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen"
                  value="{{ old('nama_konsumen') }}" required>
              </div>
              <div class="col-md-6">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" required>
              </div>
              <div class="col-md-6">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                  required>
              </div>
              <div class="col-md-6">
                <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                <select class="form-select" id="status_perkawinan" name="status_perkawinan">
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Menikah">Menikah</option>
                  <option value="Cerai">Cerai</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="nama_pasangan" class="form-label">Nama Pasangan (Jika Menikah)</label>
                <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                  value="{{ old('nama_pasangan') }}">
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-header">Data Kendaraan</div>
            <div class="card-body row g-3">
              <div class="col-md-6"><label for="dealer" class="form-label">Dealer</label><input type="text"
                  class="form-control" id="dealer" name="dealer" value="{{ old('dealer') }}"></div>
              <div class="col-md-6"><label for="merk_kendaraan" class="form-label">Merk Kendaraan</label><input
                  type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan"
                  value="{{ old('merk_kendaraan') }}"></div>
              <div class="col-md-6"><label for="model_kendaraan" class="form-label">Model Kendaraan</label><input
                  type="text" class="form-control" id="model_kendaraan" name="model_kendaraan"
                  value="{{ old('model_kendaraan') }}"></div>
              <div class="col-md-6"><label for="tipe_kendaraan" class="form-label">Tipe Kendaraan</label><input
                  type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan"
                  value="{{ old('tipe_kendaraan') }}"></div>
              <div class="col-md-6"><label for="warna_kendaraan" class="form-label">Warna Kendaraan</label><input
                  type="text" class="form-control" id="warna_kendaraan" name="warna_kendaraan"
                  value="{{ old('warna_kendaraan') }}"></div>
              <div class="col-md-6"><label for="harga_kendaraan" class="form-label">Harga Kendaraan (Rp)</label><input
                  type="number" class="form-control" id="harga_kendaraan" name="harga_kendaraan"
                  value="{{ old('harga_kendaraan') }}"></div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-header">Data Pinjaman</div>
            <div class="card-body row g-3">
              <div class="col-md-6"><label for="asuransi" class="form-label">Asuransi</label><input type="text"
                  class="form-control" id="asuransi" name="asuransi" value="{{ old('asuransi') }}"></div>
              <div class="col-md-6"><label for="down_payment" class="form-label">Down Payment (Rp)</label><input
                  type="number" class="form-control" id="down_payment" name="down_payment"
                  value="{{ old('down_payment') }}"></div>
              <div class="col-md-6"><label for="lama_kredit_bulan" class="form-label">Lama Kredit (Bulan)</label><input
                  type="number" class="form-control" id="lama_kredit_bulan" name="lama_kredit_bulan"
                  value="{{ old('lama_kredit_bulan') }}"></div>
              <div class="col-md-6"><label for="angsuran_per_bulan" class="form-label">Angsuran / Bulan
                  (Rp)</label><input type="number" class="form-control" id="angsuran_per_bulan"
                  name="angsuran_per_bulan" value="{{ old('angsuran_per_bulan') }}"></div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-header">Upload Dokumen</div>
            <div class="card-body row g-3">
              <div class="col-md-6"><label for="file_ktp" class="form-label">KTP</label><input type="file"
                  class="form-control" id="file_ktp" name="file_ktp"></div>
              <div class="col-md-6"><label for="file_kk" class="form-label">Kartu Keluarga</label><input type="file"
                  class="form-control" id="file_kk" name="file_kk"></div>
              <div class="col-md-6"><label for="file_bukti_bayar" class="form-label">Bukti Bayar Tanda
                  Jadi</label><input type="file" class="form-control" id="file_bukti_bayar" name="file_bukti_bayar">
              </div>
              <div class="col-md-6"><label for="file_form_aplikasi" class="form-label">Form Aplikasi
                  Pengajuan</label><input type="file" class="form-control" id="file_form_aplikasi"
                  name="file_form_aplikasi"></div>
            </div>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary btn-lg">Submit Data Pengajuan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>