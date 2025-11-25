@extends('backend.layout.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>

    <!-- Tombol Tambah Pegawai -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPegawaiModal">
            <i class="fas fa-user-plus"></i> Tambah Pegawai
        </button>
    </div>

    <!-- Tabel Data Pegawai -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelPegawai">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Siti Rahma</td>
                            <td>Petugas Administrasi</td>
                            <td>08123456789</td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pegawai -->
<div class="modal fade" id="tambahPegawaiModal" tabindex="-1" aria-labelledby="tambahPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formPegawai" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahPegawaiLabel">Tambah Pegawai Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text" id="namaPegawai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" id="jabatanPegawai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="text" id="teleponPegawai" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const formPegawai = document.getElementById('formPegawai');
    const tabelPegawai = document.querySelector('#tabelPegawai tbody');
    let nomor = 1 + tabelPegawai.rows.length;

    formPegawai.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil data dari form
        const nama = document.getElementById('namaPegawai').value;
        const jabatan = document.getElementById('jabatanPegawai').value;
        const telepon = document.getElementById('teleponPegawai').value;

        // Tambah baris baru
        const row = tabelPegawai.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${nama}</td>
            <td>${jabatan}</td>
            <td>${telepon}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </td>
        `;

        nomor++;

        // Reset form & tutup modal
        formPegawai.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahPegawaiModal'));
        modal.hide();
    });
</script>

</body>
</html>

@endsection
