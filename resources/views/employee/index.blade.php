@extends('template.main')
@section('content')
    <div class="body-wrapper-inner">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <div class="d-flex flex-wrap justify-content-between align-items-start align-items-md-center mb-3">

                        <!-- Judul -->
                        <div class="mb-3 mb-md-0">
                            <h4 class="card-title">Daftar Pegawai</h4>
                            <p class="card-subtitle text-muted">Data pegawai lengkap</p>
                        </div>

                        <!-- Filter + Tombol -->
                        <div class="d-flex flex-wrap flex-md-nowrap gap-2">

                            <!-- Dropdown Filter -->
                            <select id="filterUnit" class="form-select" style="min-width:180px;">
                                <option value="">Semua Unit Kerja</option>
                                @foreach ($unit as $u)
                                    <option value="{{ $u->nama_unit }}">{{ $u->nama_unit }}</option>
                                @endforeach
                            </select>

                            <!-- Tombol Tambah -->
                            <a href="{{ route('employees.create') }}"
                                class="btn btn-primary d-flex align-items-center gap-1">
                                <i class="ti ti-plus"></i>
                                <span>Tambah</span>
                            </a>

                            <!-- Tombol Print -->
                            <a href="{{ route('employees.print') }}" target="_blank"
                                class="btn btn-success d-flex align-items-center gap-1">
                                <i class="ti ti-printer"></i>
                                <span>Cetak</span>
                            </a>

                        </div>

                    </div>

                    <div class="table-responsive mt-4">
                        <table id="pegawaiTable" class="table table-bordered table-striped fs-3">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Alamat</th>
                                    <th>Tgl Lahir</th>
                                    <th>L/P</th>
                                    <th>Gol</th>
                                    <th>Eselon</th>
                                    <th>Jabatan</th>
                                    <th>Tempat Tugas</th>
                                    <th>Agama</th>
                                    <th>Unit Kerja</th>
                                    <th>No HP</th>
                                    <th>NPWP</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($employees as $e)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/' . $e->foto) }}" width="50" height="50"
                                                class="rounded-circle"></td>
                                        <td>{{ $e->nip }}</td>
                                        <td>{{ $e->nama }}</td>
                                        <td>{{ $e->tempat_lahir }}</td>
                                        <td>{{ $e->alamat }}</td>
                                        <td>{{ $e->tanggal_lahir }}</td>
                                        <td>{{ $e->jenis_kelamin }}</td>
                                        <td>{{ $e->position->jabatan->golongan }}</td>
                                        <td>{{ $e->position->jabatan->eselon }}</td>
                                        <td>{{ $e->position->jabatan->nama_jabatan ?? '-' }}</td>
                                        <td>{{ $e->position->tempat_tugas ?? '-' }}</td>
                                        <td>{{ $e->agama->nama_agama ?? '-' }}</td>
                                        <td>{{ $e->position->unitKerja->nama_unit ?? '-' }}</td>
                                        <td>{{ $e->no_hp }}</td>
                                        <td>{{ $e->npwp }}</td>

                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('employees.edit', $e->id) }}"
                                                class="btn btn-warning btn-sm d-inline-flex align-items-center justify-content-center mb-1"
                                                title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>

                                            <!-- Tombol Delete -->
                                            <form action="{{ route('employees.delete', $e->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center"
                                                    title="Hapus">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
