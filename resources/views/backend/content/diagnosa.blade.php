@extends('backend.layout.main')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Data Diagnosis Pasien</h1>

    <!-- Tombol Tambah Diagnosis -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDiagnosisModal">
            <i class="fas fa-plus-circle"></i> Tambah Diagnosis
        </button>
    </div>

    <!-- Tabel Diagnosis -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Diagnosis Pasien</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelDiagnosis">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Dokter</th>
                            <th>Tanggal</th>
                            <th>Diagnosa</th>
                            <th>Tindakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data otomatis muncul di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Diagnosis -->
<div class="modal fade" id="tambahDiagnosisModal" tabindex="-1" aria-labelledby="tambahDiagnosisLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formDiagnosis" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahDiagnosisLabel">Tambah Diagnosis Baru</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Pasien</label>
                    <input type="text" id="namaPasien" class="form-control" placeholder="Nama pasien" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Dokter</label>
                    <input type="text" id="namaDokter" class="form-control" placeholder="Nama dokter pemeriksa" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeriksaan</label>
                    <input type="date" id="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diagnosa</label>
                    <textarea id="diagnosa" class="form-control" placeholder="Masukkan hasil diagnosa" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <textarea id="tindakan" class="form-control" placeholder="Masukkan tindakan yang diberikan" required></textarea>
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
    const formDiagnosis = document.getElementById('formDiagnosis');
    const tabelDiagnosis = document.querySelector('#tabelDiagnosis tbody');
    let nomor = 1;

    formDiagnosis.addEventListener('submit', function(e) {
        e.preventDefault();

        const namaPasien = document.getElementById('namaPasien').value;
        const namaDokter = document.getElementById('namaDokter').value;
        const tanggal = document.getElementById('tanggal').value;
        const diagnosa = document.getElementById('diagnosa').value;
        const tindakan = document.getElementById('tindakan').value;

        const row = tabelDiagnosis.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${namaPasien}</td>
            <td>${namaDokter}</td>
            <td>${tanggal}</td>
            <td>${diagnosa}</td>
            <td>${tindakan}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm" onclick="editBaris(this)"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
            </td>
        `;
        nomor++;

        formDiagnosis.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahDiagnosisModal'));
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
