@extends('backend.layout.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Level Pengguna</h1>

    <!-- Tombol Tambah Level -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahLevelModal">
            <i class="fas fa-plus"></i> Tambah Level
        </button>
    </div>

    <!-- Tabel Level Pengguna -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Level Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelLevel">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Level</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Administrator</td>
                            <td>Memiliki akses penuh ke sistem</td>
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

<!-- Modal Tambah Level -->
<div class="modal fade" id="tambahLevelModal" tabindex="-1" aria-labelledby="tambahLevelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formLevel" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahLevelLabel">Tambah Level Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Level</label>
                    <input type="text" id="namaLevel" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="deskripsiLevel" class="form-control" rows="3" required></textarea>
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
    const formLevel = document.getElementById('formLevel');
    const tabelLevel = document.querySelector('#tabelLevel tbody');
    let nomor = 1 + tabelLevel.rows.length;

    formLevel.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil data dari form
        const namaLevel = document.getElementById('namaLevel').value;
        const deskripsiLevel = document.getElementById('deskripsiLevel').value;

        // Tambah baris baru ke tabel
        const row = tabelLevel.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${namaLevel}</td>
            <td>${deskripsiLevel}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </td>
        `;

        nomor++;

        // Reset form dan tutup modal
        formLevel.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahLevelModal'));
        modal.hide();
    });
</script>

</body>
</html>

@endsection
