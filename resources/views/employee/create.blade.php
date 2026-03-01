@extends('template.main')
@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <h4 class="card-title">Tambah Pegawai</h4>
                <p class="card-subtitle text-muted">Isi data pegawai dengan lengkap</p>

                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Jenis Kelamin</label><br>
                            <input type="radio" name="jenis_kelamin" value="L"> Laki-laki
                            <input type="radio" name="jenis_kelamin" value="P" class="ms-3"> Perempuan
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Agama</label><br>
                            @foreach ($agama as $a)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="agama_id"
                                        id="agama{{ $a->id }}" value="{{ $a->id }}">
                                    <label class="form-check-label" for="agama{{ $a->id }}">
                                        {{ $a->nama_agama }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">NPWP</label>
                            <input type="text" name="npwp" class="form-control">
                        </div>

                        <hr class="mt-4">

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan_id" class="form-select">
                                @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Unit Kerja</label>
                            <select name="unit_kerja_id" class="form-select">
                                @foreach ($unitKerja as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama_unit }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tempat Tugas</label>
                            <input type="text" name="tempat_tugas" class="form-control">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Foto Pegawai</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                    </div>


                </form>

            </div>
        </div>

    </div>
@endsection
