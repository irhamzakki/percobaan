@extends('backend.layout.main')

@section('content')
<div class="container mt-4">
    <h3>Data Obat</h3>

    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Obat -->
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#tambahObatModal">
        <i class="fas fa-plus-circle"></i> Tambah Obat Baru
    </button>

    <!-- Tabel Data Obat -->
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Kode</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                <th>Tgl Kadaluarsa</th>
                <th>Satuan</th>
                <th>Letak</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($obat as $item)
                <tr>
                    <td>{{ $item->Kode_obat }}</td>
                    <td>{{ $item->nm_obat }}</td>
                    <td>Rp {{ number_format($item->harga_obat, 0, ',', '.') }}</td>
                    <td>{{ $item->tgl_kadaluarsa }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->letak_obat }}</td>
                    <td>{{ $item->stok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data obat</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah Obat -->
<div class="modal fade" id="tambahObatModal" tabindex="-1" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahObatModalLabel">Tambah Data Obat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="Kode_obat" class="form-label">Kode Obat</label>
                        <input type="text" class="form-control" id="Kode_obat" name="Kode_obat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nm_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" id="nm_obat" name="nm_obat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="harga_obat" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga_obat" name="harga_obat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="letak_obat" class="form-label">Letak</label>
                        <input type="text" class="form-control" id="letak_obat" name="letak_obat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
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

{{-- Tambahkan Bootstrap JS agar modal bisa muncul --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
