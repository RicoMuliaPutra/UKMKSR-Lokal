<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;
use Database\Seeders\layananSeeder;
use Database\Seeders\KegiatanSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        // $this-> call(SeedersBlog)
        \App\Models\User::factory()->create([
            'name' => 'HUMAS KSR',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123')

        ]);

        $this->call([
            BlogSeeder::class,
            layananSeeder::class,
            KegiatanSeeder::class,
            tentangSeeder::class,
            anggotaSeeder::class,
            kepengurasanSeeder::class,
        ]);
    }
}
