<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    public function definition(): array
    {
        $tanggalMulai = $this->faker->dateTimeBetween('-3 months', 'now');
        $tanggalSelesai = $this->faker->dateTimeBetween($tanggalMulai, '+3 months');

        return [
            'nis' => $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->randomElement([
                'XI RPL 1',
                'XI RPL 2',
                'XI TKJ 1',
            ]),
            'tanggal_mulai_pkl' => $tanggalMulai,
            'tanggal_selesai_pkl' => $tanggalSelesai,
            'perusahaan_id' => Perusahaan::inRandomOrder()->first()->id
                ?? Perusahaan::factory(),
        ];
    }
}