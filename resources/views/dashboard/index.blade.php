@extends('template.main')
@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Pertumbuhan Pegawai</h4>
                                    <p class="card-subtitle">Jumlah pegawai baru setiap bulan</p>
                                </div>
                            </div>
                            <div id="pegawai-per-bulan" class="mt-4 mx-n6"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">

                            <h4 class="card-title">Unit Kerja Terbanyak</h4>
                            <p class="card-subtitle">Unit dengan jumlah pegawai terbanyak</p>

                            <div class="mt-4 pb-3 d-flex align-items-center">
                                <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                    <i class="ti ti-building fs-6"></i>
                                </span>

                                <div class="ms-3">
                                    <h5 class="mb-0 fw-bolder fs-4">
                                        {{ $unitTerbanyak->nama_unit }}
                                    </h5>

                                    <span class="text-muted fs-3">
                                        {{ $unitTerbanyak->positions_count }} Pegawai
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <h4 class="card-title">Total Pegawai</h4>
                            <p class="card-subtitle">Jumlah pegawai keseluruhan</p>

                            <div class="mt-4 pb-3 d-flex align-items-center">
                                <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                    <i class="ti ti-user fs-6"></i>
                                </span>

                                <div class="ms-3">
                                    <span class="text-muted fs-3">
                                        {{ $totalPegawai }} Pegawai
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Employee Data</h4>

                                </div>
                            
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                    <thead>
                                        <tr>
                                            <th class="px-0 text-muted">Nama</th>
                                            <th class="px-0 text-muted">Tempat Tugas</th>
                                            <th class="px-0 text-muted">Unit Kerja</th>
                                            <th class="px-0 text-muted text-end">NIP</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($employees as $e)
                                            <tr>
                                                <td class="px-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/' . $e->foto) }}" class="rounded-circle"
                                                            width="40" alt="foto">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 fw-bolder">{{ $e->nama }}</h6>
                                                            <span
                                                                class="text-muted">{{ $e->position->jabatan->nama_jabatan ?? '-' }}</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-0">{{ $e->position->tempat_tugas ?? '-' }}</td>

                                                <td class="px-0">
                                                    <span class="badge bg-info">
                                                        {{ $e->position->unitKerja->nama_unit ?? '-' }}
                                                    </span>
                                                </td>

                                                <td class="px-0 text-dark fw-medium text-end">
                                                    {{ $e->nip }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="#"
                        class="pe-1 text-primary text-decoration-underline">Athallah</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var options = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: [{
                    name: 'Pegawai Baru',
                    data: @json($pegawaiPerBulan->pluck('total'))
                }],
                xaxis: {
                    categories: @json($pegawaiPerBulan->pluck('bulan'))
                },
                stroke: {
                    curve: 'smooth'
                },
                markers: {
                    size: 5
                }
            };

            var chart = new ApexCharts(document.querySelector("#pegawai-per-bulan"), options);
            chart.render();
        });
    </script>
@endsection
