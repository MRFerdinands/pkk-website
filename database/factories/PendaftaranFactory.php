<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'plat_nomor' => Str::upper($this->faker->bothify('?? ### ??')),
            'nama_pelanggan' => $this->faker->name,
            'kendaraan' => $this->faker->randomElement(['Mobil', 'Motor']),
            'merk_kendaraan' => $this->faker->randomElement(['Toyota', 'Honda', 'Suzuki']),
            'biaya_tambahan' => $this->faker->numberBetween(0, 100000),
            'id_service' => \App\Models\Service::all()->random()->id,
            'total' => $this->faker->numberBetween(100000, 1000000),
            'created_at' => $this->faker->dateTimeBetween('-50 years', 'now')
        ];
    }
}
