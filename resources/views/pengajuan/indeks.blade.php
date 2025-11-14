<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengajuan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>Daftar Pengajuan Masuk</h1>
      <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">Buat Pengajuan Baru</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Konsumen</th>
              <th>Kendaraan</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Dokumen</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($semuaPengajuan as $pengajuan)
            <tr>
              <td>{{ $pengajuan->id }}</td>
              <td>{{ $pengajuan->nama_konsumen }}<br><small>{{ $pengajuan->nik }}</small></td>
              <td>{{ $pengajuan->merk_kendaraan }} {{ $pengajuan->model_kendaraan }}</td>
              <td>Rp {{ number_format($pengajuan->harga_kendaraan, 0, ',', '.') }}</td>
              <td>
                <span class="badge 
                                    @if($pengajuan->status == 'Submitted') bg-warning
                                    @elseif($pengajuan->status == 'Approved') bg-success
                                    @else bg-danger @endif">
                  {{ $pengajuan->status }}
                </span>
              </td>
              <td>
                @if($pengajuan->file_ktp)
                <a href="{{ Storage::url($pengajuan->file_ktp) }}" target="_blank">KTP</a><br>
                @endif
                @if($pengajuan->file_kk)
                <a href="{{ Storage::url($pengajuan->file_kk) }}" target="_blank">KK</a>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">Belum ada data pengajuan.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>