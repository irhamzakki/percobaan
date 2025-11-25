@extends('backend.layout.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h15 mb-0 text-gray-800">Dashboard Puskesmas</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-file-medical fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Statistik Ringkas -->
    <div class="row">
        <!-- Jumlah Pasien -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pasien Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
                    </div>
                    <i class="fas fa-procedures fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Jumlah Dokter -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                    </div>
                    <i class="fas fa-user-md fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Jadwal Praktek -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jadwal Praktek Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                    </div>
                    <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Stok Obat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Stok Obat Tersedia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">350</div>
                    </div>
                    <i class="fas fa-pills fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Batang Statistik -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Kunjungan Pasien per Bulan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== -->
    <!-- 🔹 MENU HALAMAN 🔹 -->
    <!-- ==================== -->
    <div class="row">
        @if(!empty($menuItems) && count($menuItems) > 0)
            @foreach($menuItems as $item)
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route($item['route']) }}" class="text-decoration-none">
                        <div class="card border-left-{{ $item['color'] }} shadow h-100 py-2">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-xs font-weight-bold text-{{ $item['color'] }} text-uppercase mb-1">
                                        {{ $item['title'] }}
                                    </div>
                                    <span class="text-gray-800">Lihat Detail</span>
                                </div>
                                <i class="fas {{ $item['icon'] }} fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center text-muted">
                <p></p>
            </div>
        @endif
    </div>

</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Pasien',
                data: [120, 150, 180, 160, 200, 220, 210, 190, 230, 250, 270, 300],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
