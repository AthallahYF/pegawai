<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitKerja;

class UnitKerjaSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            'Sekretariat',
            'Keuangan',
            'Kepegawaian',
            'Humas',
            'Umum',
            'IT Support',
            'Pengembangan SDM',
        ];

        foreach ($units as $u) {
            UnitKerja::create([
                'nama_unit' => $u
            ]);
        }
    }
}
