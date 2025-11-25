@extends('backend.layout.main')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Data Tindakan Medis</h1>

    <!-- Tombol Tambah Tindakan -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTindakanModal">
            <i class="fas fa-plus-circle"></i> Tambah Tindakan
        </button>
    </div>

    <!-- Tabel Tindakan -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Tindakan Medis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelTindakan">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Tindakan</th>
                            <th>Deskripsi</th>
                            <th>Tarif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan muncul di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Tindakan -->
<div class="modal fade" id="tambahTindakanModal" tabindex="-1" aria-labelledby="tambahTindakanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formTindakan" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahTindakanLabel">Tambah Tindakan Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Tindakan</label>
                    <input type="text" id="namaTindakan" class="form-control" placeholder="Contoh: Pemeriksaan Umum" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" class="form-control" placeholder="Masukkan deskripsi tindakan" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tarif (Rp)</label>
                    <input type="number" id="tarif" class="form-control" placeholder="Contoh: 50000" required>
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
    const formTindakan = document.getElementById('formTindakan');
    const tabelTindakan = document.querySelector('#tabelTindakan tbody');
    let nomor = 1;

    formTindakan.addEventListener('submit', function(e) {
        e.preventDefault();

        const namaTindakan = document.getElementById('namaTindakan').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const tarif = document.getElementById('tarif').value;

        const row = tabelTindakan.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${namaTindakan}</td>
            <td>${deskripsi}</td>
            <td>Rp ${parseInt(tarif).toLocaleString('id-ID')}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm" onclick="editBaris(this)"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
            </td>
        `;
        nomor++;

        formTindakan.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahTindakanModal'));
        modal.hide();
    });

    function hapusBaris(button) {
        const row = button.closest('tr');
        row.remove();
    }

    function editBaris(button) {
        alert('Fitur edit bisa dikembangkan untuk update data ke database.');
    }
</script>
@endsection
