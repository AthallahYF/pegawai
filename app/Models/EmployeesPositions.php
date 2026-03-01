<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeesPositions extends Model
{
    protected $table = 'employee_positions';

    protected $fillable = [
        'employee_id',
        'jabatan_id',
        'unit_kerja_id',
        'tempat_tugas',
    ];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'jabatan_id');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function tempatTugas()
    {
        return $this->tempat_tugas; // hanya field biasa, bukan relasi
    }
}
