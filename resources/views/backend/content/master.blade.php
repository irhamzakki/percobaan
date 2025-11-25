@extends('backend.layout.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Data Master</h1>

    <!-- Tombol Tambah Data Master -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </button>
    </div>

    <!-- Tabel Data Master -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Data Master</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelMaster">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Data</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>DM001</td>
                            <td>Jenis Pelayanan</td>
                            <td>Data dasar untuk layanan puskesmas</td>
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

<!-- Modal Tambah Data Master -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formDataMaster" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Master Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" id="kodeMaster" class="form-control" placeholder="Contoh: DM002" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Data</label>
                    <input type="text" id="namaMaster" class="form-control" placeholder="Contoh: Jenis Obat" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea id="keteranganMaster" class="form-control" rows="3" placeholder="Tuliskan deskripsi singkat" required></textarea>
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
    const formDataMaster = document.getElementById('formDataMaster');
    const tabelMaster = document.querySelector('#tabelMaster tbody');
    let nomor = 1 + tabelMaster.rows.length;

    formDataMaster.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil data dari form
        const kode = document.getElementById('kodeMaster').value;
        const nama = document.getElementById('namaMaster').value;
        const keterangan = document.getElementById('keteranganMaster').value;

        // Tambah baris baru ke tabel
        const row = tabelMaster.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${kode}</td>
            <td>${nama}</td>
            <td>${keterangan}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </td>
        `;

        nomor++;

        // Reset form dan tutup modal
        formDataMaster.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahDataModal'));
        modal.hide();
    });
</script>

</body>
</html>

@endsection
