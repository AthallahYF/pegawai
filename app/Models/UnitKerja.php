<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';

    protected $fillable = [
        'unit_kerja',
    ];

    public function positions()
    {
        return $this->hasMany(EmployeesPositions::class, 'unit_kerja_id');
    }
}
