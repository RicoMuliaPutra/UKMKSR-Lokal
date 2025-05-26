<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Anggota::class;

    public function definition(): array
    {
        $angkatan = $this->faker->numberBetween(11, 15);
        $tahunMasukKuliah = 2010 + $angkatan;

        return [
            'nim' => $this->faker->unique()->numerify('E########'), 
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'angkatan' => $angkatan,
            'alasan_join' => $this->faker->sentence(6),
            'jurusan' => $this->faker->randomElement(['Teknologi Informasi']),
            'prodi' => $this->faker->randomElement(['Teknik Komputer', 'Teknik Informatika']),
            'status' => $this->faker->randomElement(['Aktif', 'Inaktif']),
            'tahun_masuk_kuliah' => $tahunMasukKuliah,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'alamat' => $this->faker->address(),
            'created_at' => now(),
        ];
    }
}
