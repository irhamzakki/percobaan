@extends('backend.layout.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Kelola Pengguna</h1>

    <!-- Tombol Tambah Pengguna -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="fas fa-user-plus"></i> Tambah Pengguna
        </button>
    </div>

    <!-- Tabel Data Pengguna -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelPengguna">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Admin Utama</td>
                            <td>admin@puskesmas.id</td>
                            <td><span class="badge bg-success text-white">Administrator</span></td>
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

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTambah" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pengguna Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <select class="form-select" id="level" required>
                        <option value="">-- Pilih Level --</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Petugas">Petugas</option>
                        <option value="Dokter">Dokter</option>
                    </select>
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
    const form = document.getElementById('formTambah');
    const tabel = document.querySelector('#tabelPengguna tbody');
    let nomor = 1 + tabel.rows.length; // hitung nomor otomatis

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil data dari form
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const level = document.getElementById('level').value;

        // Buat baris baru
        const row = tabel.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${nama}</td>
            <td>${email}</td>
            <td><span class="badge bg-info text-dark">${level}</span></td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </td>
        `;

        nomor++;

        // Reset form & tutup modal
        form.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahModal'));
        modal.hide();
    });
</script>

</body>
</html>

@endsection
