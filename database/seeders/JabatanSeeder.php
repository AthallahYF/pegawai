<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        $jabatan = [
            ['nama_jabatan' => 'Staff', 'golongan' => 'IIA', 'eselon' => 'IV'],
            ['nama_jabatan' => 'Supervisor', 'golongan' => 'IIB', 'eselon' => 'III'],
            ['nama_jabatan' => 'Manager', 'golongan' => 'III', 'eselon' => 'II'],
            ['nama_jabatan' => 'Kepala Bagian', 'golongan' => 'IV', 'eselon' => 'I'],
        ];

        foreach ($jabatan as $j) {
            Jabatan::create($j);
        }
    }
}
