<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nis' => '1234567890',
                'nama' => 'Budi Santoso',
                'kelas' => 'XI RPL 1',
                'tanggal_mulai_pkl' => '2026-07-01',
                'tanggal_selesai_pkl' => '2026-10-01',
                'perusahaan_id' => 1,
            ],
            [
                'nis' => '1234567891',
                'nama' => 'Siti Aisyah',
                'kelas' => 'XI RPL 2',
                'tanggal_mulai_pkl' => '2026-07-01',
                'tanggal_selesai_pkl' => '2026-10-01',
                'perusahaan_id' => 2,
            ],
        ];

        foreach ($data as $item) {
            Siswa::create($item);
        }
    }
}