<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama_id',
        'no_hp',
        'npwp',
        'foto'
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    // 🔹 Relasi ke tabel unit kerja
    // public function unitKerja()
    // {
    //     return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    // }

    // // 🔹 Relasi ke tabel jabatan
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'jabatan_id');
    }

    public function position()
    {
        return $this->hasOne(EmployeesPositions::class, 'employee_id');
    }

}
