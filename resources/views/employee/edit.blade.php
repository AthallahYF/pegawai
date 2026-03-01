@extends('template.main')
@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Pegawai</h4>
                <p class="card-subtitle text-muted">Perbarui data pegawai</p>

                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" value="{{ $employee->nip }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" name="nama" class="form-control" value="{{ $employee->nama }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ $employee->tempat_lahir }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ $employee->tanggal_lahir }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Jenis Kelamin</label><br>
                            <input type="radio" name="jenis_kelamin" value="L"
                                {{ $employee->jenis_kelamin == 'L' ? 'checked' : '' }}> Laki-laki
                            <input type="radio" name="jenis_kelamin" value="P"
                                {{ $employee->jenis_kelamin == 'P' ? 'checked' : '' }} class="ms-3"> Perempuan
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ $employee->alamat }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Agama</label><br>
                            @foreach ($agama as $a)
                                <input type="radio" name="agama_id" value="{{ $a->id }}"
                                    {{ $employee->agama_id == $a->id ? 'checked' : '' }}> {{ $a->nama_agama }}
                            @endforeach
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $employee->no_hp }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">NPWP</label>
                            <input type="text" name="npwp" class="form-control" value="{{ $employee->npwp }}">
                        </div>

                        <hr class="mt-4">

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan_id" class="form-select">
                                @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ $employee->position->jabatan_id == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Unit Kerja</label>
                            <select name="unit_kerja_id" class="form-select">
                                @foreach ($unit_kerja as $u)
                                    <option value="{{ $u->id }}"
                                        {{ $employee->position->unit_kerja_id == $u->id ? 'selected' : '' }}>
                                        {{ $u->nama_unit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Tempat Tugas</label>
                            <input type="text" name="tempat_tugas" class="form-control"
                                value="{{ $employee->position->tempat_tugas }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">Foto Pegawai</label><br>
                            <img src="{{ asset('storage/' . $employee->foto) }}" width="80" class="rounded mb-2">
                            <input type="file" name="foto" class="form-control">
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button class="btn btn-success">Update</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
