@extends('backend.layout.main')

@section('content')
<div class="container mt-4">
    <h3>Data Dokter</h3>

    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Dokter -->
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#tambahDokterModal">
        <i class="fas fa-user-md"></i> Tambah Dokter Baru
    </button>

    <!-- Tabel Data Dokter -->
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>JK</th>
                <th>Status</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Pendidikan</th>
                <th>Kode Keahlian</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokter as $item)
                <tr>
                    <td>{{ $item->id_dokter }}</td>
                    <td>{{ $item->nm_dokter }}</td>
                    <td>{{ $item->JK }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->Kode_Keahlian }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada data dokter</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah Dokter -->
<div class="modal fade" id="tambahDokterModal" tabindex="-1" aria-labelledby="tambahDokterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahDokterModalLabel">Tambah Data Dokter</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ID Dokter</label>
                        <input type="text" name="id_dokter" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Dokter</label>
                        <input type="text" name="nm_dokter" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="JK" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kode Keahlian</label>
                        <select name="Kode_Keahlian" class="form-control" required>
                            <option value="">-- Pilih Keahlian --</option>
                            @foreach ($keahlian as $item)
                                <option value="{{ $item->Kode_keahlian }}">{{ $item->Nama_keahlian }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
