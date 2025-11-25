@extends('backend.layout.main')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Jadwal Praktek</h1>

    <!-- Tombol Tambah Jadwal -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwalModal">
            <i class="fas fa-plus-circle"></i> Tambah Jadwal
        </button>
    </div>

    <!-- Tabel Jadwal Praktek -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Jadwal Praktek Dokter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelJadwal">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>dr. Budi Santoso</td>
                            <td>Senin</td>
                            <td>08.00 - 12.00</td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="tambahJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formJadwal" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahJadwalLabel">Tambah Jadwal Praktek</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Dokter</label>
                    <input type="text" id="namaDokter" class="form-control" placeholder="Contoh: dr. Siti Rahma" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <select id="hari" class="form-select" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam</label>
                    <select id="jam" class="form-select" required>
                        <option value="">-- Pilih Jam Praktek --</option>
                        <option value="08.00 - 12.00">08.00 - 12.00</option>
                        <option value="13.00 - 17.00">13.00 - 17.00</option>
                        <option value="19.00 - 22.00">19.00 - 22.00</option>
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
    const formJadwal = document.getElementById('formJadwal');
    const tabelJadwal = document.querySelector('#tabelJadwal tbody');
    let nomor = tabelJadwal.rows.length + 1;

    formJadwal.addEventListener('submit', function(e) {
        e.preventDefault();

        const nama = document.getElementById('namaDokter').value;
        const hari = document.getElementById('hari').value;
        const jam = document.getElementById('jam').value;

        const row = tabelJadwal.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${nama}</td>
            <td>${hari}</td>
            <td>${jam}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
            </td>
        `;
        nomor++;

        formJadwal.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahJadwalModal'));
        modal.hide();
    });

    function hapusBaris(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
@endsection
