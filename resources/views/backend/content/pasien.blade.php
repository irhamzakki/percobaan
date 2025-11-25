@extends('backend.layout.main')

@section('content')
<div class="container mt-4">
    <h3>Data Pasien</h3>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#tambahPasienModal">
        <i class="fas fa-user-plus"></i> Tambah Pasien Baru
    </button>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>Jenis Pasien</th>
                <th>Tanggal Masuk</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasien as $item)
                <tr>
                    <td>{{ $item->Id_Pasien }}</td>
                    <td>{{ $item->Nm_Pasien }}</td>
                    <td>{{ $item->Jenis_Pasien }}</td>
                    <td>{{ $item->Tgl_Masuk }}</td>
                    <td>{{ $item->Tmpt_Lahir }}</td>
                    <td>{{ $item->Tgl_lahir }}</td>
                    <td>{{ $item->Umur }}</td>
                    <td>{{ $item->JK }}</td>
                    <td>{{ $item->Alamat }}</td>
                    <td>{{ $item->Tlpn }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center text-muted">Belum ada data pasien</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah Pasien -->
<div class="modal fade" id="tambahPasienModal" tabindex="-1" aria-labelledby="tambahPasienModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahPasienModalLabel">Tambah Data Pasien</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ID Pasien</label>
                        <input type="text" name="Id_Pasien" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" name="Nm_Pasien" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Pasien</label>
                        <input type="text" name="Jenis_Pasien" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="JK" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" name="Tgl_Masuk" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="Tgl_lahir" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="Tmpt_Lahir" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Umur</label>
                        <input type="number" name="Umur" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="Alamat" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="Tlpn" class="form-control">
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
