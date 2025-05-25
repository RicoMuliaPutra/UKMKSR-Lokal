<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LayananFactory extends Factory
{
    protected $model = \App\Models\Layanan::class;

    public function definition()
    {
        return [
            'nama_layanan' => $this->faker->words(2, true),
            'deskripsi_layanan' => $this->faker->paragraph(),
            'foto_layanan' => $this->faker->imageUrl(640, 480, 'service', true),
            'poster_layanan' => $this->faker->imageUrl(640, 480, 'poster', true),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
