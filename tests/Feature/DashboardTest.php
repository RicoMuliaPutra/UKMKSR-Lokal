<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;  // ganti ini
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Layanan;
use Illuminate\Support\Carbon;

class DashboardTest extends TestCase
{
    use DatabaseTransactions; 

    public function test_dashboard_can_be_accessed_by_authenticated_user()
    {
        $user = User::factory()->create([
            'role' => 'humas_ksr', 
        ]);

        Anggota::factory()->create([
            'angkatan' => rand(11, 15),
            'status' => 'aktif',
            'tanggal_lahir' => Carbon::now()->subYears(20),
        ]);

        Kegiatan::factory()->create([
            'status' => 'aktif',
        ]);

        Layanan::factory()->create([
            'status' => 'aktif',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);

        $response->assertViewIs('admin.dashboard');

        $response->assertViewHasAll([
            'title',
            'tahun_sekarang',
            'jumlah_seluruh_anggota',
            'jumlah_seluruh_anggota_aktif',
            'jumlah_seluruh_anggota_in_aktif',
            'jumlah_kegiatan',
            'jumlah_layanan',
            'data_grafik',
            'angkatan_grafik',
            'ulang_tahun_anggota',
        ]);
    }
}
