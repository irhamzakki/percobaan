@extends('backend.layout.main')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 text-gray-800">Data Pendaftaran Pasien</h1>

    <!-- Tombol Tambah Pendaftaran -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPendaftaranModal">
            <i class="fas fa-plus-circle"></i> Tambah Pendaftaran
        </button>
    </div>

    <!-- Tabel Data Pendaftaran -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold">Daftar Pendaftaran Pasien</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tabelPendaftaran">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pasien</th>
                            <th>Dokter</th>
                            <th>Poli Tujuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data baru akan muncul di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pendaftaran -->
<div class="modal fade" id="tambahPendaftaranModal" tabindex="-1" aria-labelledby="tambahPendaftaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formPendaftaran" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahPendaftaranLabel">Tambah Pendaftaran Pasien</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" id="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pasien</label>
                    <input type="text" id="namaPasien" class="form-control" placeholder="Masukkan nama pasien" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dokter</label>
                    <select id="dokter" class="form-select" required>
                        <option value="">-- Pilih Dokter --</option>
                        <option value="dr. Budi Santoso">dr. Budi Santoso</option>
                        <option value="dr. Siti Rahma">dr. Siti Rahma</option>
                        <option value="dr. Andi Wijaya">dr. Andi Wijaya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poli Tujuan</label>
                    <select id="poli" class="form-select" required>
                        <option value="">-- Pilih Poli --</option>
                        <option value="Poli Umum">Poli Umum</option>
                        <option value="Poli Gigi">Poli Gigi</option>
                        <option value="Poli Anak">Poli Anak</option>
                        <option value="Poli KIA">Poli KIA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diperiksa">Diperiksa</option>
                        <option value="Selesai">Selesai</option>
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
    const formPendaftaran = document.getElementById('formPendaftaran');
    const tabelPendaftaran = document.querySelector('#tabelPendaftaran tbody');
    let nomor = tabelPendaftaran.rows.length + 1;

    formPendaftaran.addEventListener('submit', function(e) {
        e.preventDefault();

        const tanggal = document.getElementById('tanggal').value;
        const nama = document.getElementById('namaPasien').value;
        const dokter = document.getElementById('dokter').value;
        const poli = document.getElementById('poli').value;
        const status = document.getElementById('status').value;

        // Tambah baris baru
        const row = tabelPendaftaran.insertRow();
        row.innerHTML = `
            <td class="text-center">${nomor}</td>
            <td>${tanggal}</td>
            <td>${nama}</td>
            <td>${dokter}</td>
            <td>${poli}</td>
            <td class="text-center">${status}</td>
            <td class="text-center">
                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" onclick="hapusBaris(this)"><i class="fas fa-trash"></i></button>
            </td>
        `;
        nomor++;

        // Reset form dan tutup modal
        formPendaftaran.reset();
        const modal = bootstrap.Modal.getInstance(document.getElementById('tambahPendaftaranModal'));
        modal.hide();
    });

    function hapusBaris(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
@endsection
