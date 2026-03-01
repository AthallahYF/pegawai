<!DOCTYPE html>
<html>

<head>
    <title>Cetak Daftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #f1f1f1;
        }

        img {
            border-radius: 4px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <h2 style="text-align:center;">DAFTAR PEGAWAI</h2>

    <button class="no-print" onclick="window.print()" style="padding:8px 12px; margin-bottom:10px;">Print</button>

    <table>
        <thead>
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
            </tr>
        </thead>

        <tbody>
            @foreach ($employees as $e)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $e->foto) }}" width="50" height="50">
                    </td>
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
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
