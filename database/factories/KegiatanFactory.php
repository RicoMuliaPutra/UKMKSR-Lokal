<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KegiatanFactory extends Factory
{
    protected $model = \App\Models\Kegiatan::class;

    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDate = $this->faker->dateTimeBetween($startDate, '+2 months');

        return [
            'nama_kegiatan' => $this->faker->sentence(3),
            'deskripsi_kegiatan' => $this->faker->paragraph(),
            'start_kegiatan' => $startDate,
            'end_kegiatan' => $endDate,
            'foto_kegiatan' => $this->faker->imageUrl(640, 480, 'event', true),
            'poster_kegiatan' => $this->faker->imageUrl(640, 480, 'poster', true),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
