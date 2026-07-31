<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perusahaan>
 */
use App\Models\Perusahaan;
class PerusahaanFactory extends Factory
{
    protected $model = Perusahaan::class;

    public function definition(): array
    {
        return [
            'nama_perusahaan' => $this->faker->company(),
            'bidang_usaha' => $this->faker->jobTitle(),
            'alamat' => $this->faker->address(),
            'nama_pembimbing_industri' => $this->faker->name(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}

