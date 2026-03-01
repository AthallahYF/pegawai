<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    public function run(): void
    {
        $agama = [
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Konghucu',
        ];

        foreach ($agama as $a) {
            Agama::create([
                'nama_agama' => $a
            ]);
        }
    }
}
